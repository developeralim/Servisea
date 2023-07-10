<?php

namespace App\Http\Controllers\Chat;

use Carbon\Carbon;
use App\Models\Gig;
use App\Models\Chat;
use App\Models\User;
use App\Models\Admin;
use App\Models\ChatMedia;
use App\Models\Quotation;
use App\Models\Freelancer;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Models\QuickResponse;
use App\Events\MessageNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public int $limit = 40;
    /**
     * Chat view
     * @param Request $request
     */
    public function index( Request $request,$username )
    {
        /**
         * Get Logged in user
         */
        $loggedIn = session()->get('user');

        /**
         * referes to whose inbox is opened
         */

        $user  = User::where('USERNAME',$username)->first();

        if ( ! $user ) {
            abort(404);
        }

        $senders       = $this->senders(  $loggedIn );

        if ( $user->USER_ID == $loggedIn->USER_ID ) {
            return view('chat.cut-off',compact('senders'));
        }

        $conversations = $this->conversations( $loggedIn,$user );

        // set session to detect whose inbox is open now
        session()->put('active_user',$user);

        $quick_responses = QuickResponse::where('USER_ID',$loggedIn->USER_ID)->latest()->get();

        // gig media
        $gigs = $this->gigs( $loggedIn );

        $payment_types = PaymentType::all();

        return view('chat.index',compact('user','senders','conversations','quick_responses','gigs','payment_types'));
    }

    /**
     * Get gigs
     */

    private function gigs( $loggedIn )
    {
        $freelancer = Freelancer::where('USER_ID',$loggedIn->USER_ID)->first();


        //check if user is freelancer or not

        if ( ! $freelancer ) {
            return [];
        }

        $gigs = Gig::where('FREELANCER_ID',$freelancer->FREELANCER_ID)->latest()->get();

        return $gigs;
    }

    /**
     * Get all message senders
     */
    private function senders( $loggedIn )
    {
        /**
         * Extract unique senders id from chats table
        */
        $sendersIds  = Chat::where('replied_to',$loggedIn->USER_ID)
                ->select('sent_by')
                ->orderBy('sent_at','desc')
                ->distinct()
                ->get()
                ->toArray();


        $users = [];

        foreach( $sendersIds as $id ) {
            $users[] = User::where('USER_ID',$id)->first();
        }

        return $users;
    }

    /**
     * Conversations
     */
    private function conversations( $loggedIn,$user )
    {

        $query = Chat::where(function( $query ) use( $loggedIn,$user ){
                $query->where('sent_by', $user->USER_ID);
                $query->where('replied_to',$loggedIn->USER_ID);
            })->orWhere(function($query) use( $loggedIn,$user ){
                $query->where('sent_by',$loggedIn->USER_ID);
                $query->where('replied_to',$user->USER_ID);
            });


        //change reading status to read
        foreach( (clone $query)->get() as $collection ) {

            if ( $collection->sent_by == $user->USER_ID ) {
                $collection->update(['unread' => 0]);
            }

        }



        return $query->limit(4000)
                    ->offset(0)
                    ->get();
    }

    /**
     * Store chats
     */
    public function store( Request $request ){

        $loggedIn = session()->get('user');

        if ( ! $loggedIn ) {
            abort( 404,'Unauthorized');
        }

        $chat = new Chat();

        $chat->sent_by    = $loggedIn->USER_ID;
        $chat->replied_to = $request->replied_to;
        $chat->text       = $request->message;
        $chat->offer      = $request->offer;
        $chat->sent_at    = Carbon::now();
        $chat->media      = serialize( $request->media ?? '' );

        $chat->save();

        event(new MessageNotification(
            $loggedIn->USER_ID
        ));

        return [
            'status' => 'success',
            'name'   => $request->replied_to
        ];
    }

    /**
     * push chat notification
     */
    public function notification()
    {
        $loggedIn = session()->get('user');
        $user     = session()->get('active_user');

        //get senders
        $senders       = $this->senders( $loggedIn );
        $conversations = $this->conversations($loggedIn,$user);

        return [
            'senderLists'   => view('chat.modules.senders',compact('senders'))->render(),
            'conversations' => view('chat.modules.conversations',compact('conversations'))->render(),
            'senders'       => count($senders)
        ];

    }

    /**
     * List imojis
     */
    public function  getEmojis( Request $request )
    {
        if ( $request->ajax() ) {

            return view('chat.emojis.emoji',[

                'emojis' => config('emoji')

            ]);

        }
    }

    /**
     * Upload chat media
     */

    public function chatMedia( Request $request )
    {
        if ($request->hasFile('file')) {

            try {
                $request->validate([
                    'file' => 'required|max:5000000'
                ]);
            } catch (\Exception $e) {
                return [
                    'status'  => 'error',
                    'message' => $e->getMessage()
                ];
            }

            $file = $request->file('file');

            if ($file->isValid()) {

                $filename   = $file->getClientOriginalName();
                $name       = pathinfo($filename,PATHINFO_FILENAME);
                $ext        = $file->extension();
                $size       = $file->getSize();
                $mime       = $file->getMimeType();

                $uploadTo = 'public/uploads/chats/'.date('Y');
                $decode   =  md5($name) . '.' . $ext;
                $file->storeAs($uploadTo,$decode);

                $uploadTo = str_replace('public','storage',$uploadTo);

                $media = new ChatMedia();
                $media->FILE_NAME    = $name;
                $media->FILE_PATH    = "$uploadTo/$decode";
                $media->URL          = asset("$uploadTo/$decode");
                $media->MIME         = $mime;
                $media->SIZE         = $size;
                $media->UPLOADED_AT  = Carbon::now();
                $media->save();

                return response()->json([
                    'message' => 'Files uploaded successfully',
                    'id'      => $media->MEDIA_ID,
                    'status'  => 'success',
                ]);

            } else {

                return response()->json([
                    'message' => 'File is not valid',
                    'status'  => 'error'
                ],300);

            }
        }

    }

    /**
     * Delete Media
     */

    public function deleteMedia( Request $request )
    {
        if ( $request->ajax() ) {
            try {


                $deleteClouser = function( $id ) {
                    $toDelete = ChatMedia::where('MEDIA_ID', $id )->first();


                    if ( Storage::exists($toDelete->FILE_PATH) ) {
                        Storage::delete( $toDelete->FILE_PATH );
                    }

                    $toDelete->delete();
                };

                if ( is_array ( $ids = $request->id ) ) {

                    foreach( $ids as $id ) {

                        $deleteClouser($id);

                    }

                } else {

                    $deleteClouser( $request->id );

                }

                return [
                    'status'  => 'success',
                    'message' => 'Media deleted'
                ];

            } catch (\Exception $e) {
                return [
                    'status'  => 'error',
                    'message' => $e->getMessage()
                ];
            }
        }
    }

    /**
     * Add quick response
     */
    public function addQuickResponse( Request $request )
    {
        if ( $request->ajax() ) {

            try {

                $request->validate([
                    'name'           => 'required',
                    'quick_response' => 'required'
                ]);

                $user     = session()->get('active_user');
                $loggedIn = session()->get('user');

                $quick_response = $request->quick_response;

                //replace placeholder with current user
                $quick_response = str_replace('{username}',$user->USER_FNAME,$quick_response);
                $name           = $request->name;

                if ( ! $id = $request->edit_id ) {

                    $response             = new QuickResponse();
                    $response->created_at = Carbon::now();
                    $type                 = 'add';

                } else {
                    $response             = QuickResponse::where('RESPONSE_ID',$id)->first();
                    $response->updated_at = Carbon::now();
                    $type                 = 'update';
                }

                $response->USER_ID    = $loggedIn->USER_ID;
                $response->NAME       = $name;
                $response->TEXT       = $quick_response;
                $response->save();

                return response([
                    'status'   => 'success',
                    'response' => view('chat.modules.quick-response',[
                        'responses' => QuickResponse::latest()->get()
                    ])->render()
                ]);

            } catch (\Exception $e) {
                return response([
                    'status'  => 'error',
                    'message' => $e->getMessage()
                ],300);
            }

        }
    }

    /**
     * Delete Quick response
     */

    public function deleteQuickResponse( Request $request,$id ) {
        if ( $request->ajax() ) {

            QuickResponse::where('RESPONSE_ID',$id)->delete();

            return response([
                'status'  => 'success',
                'message' => 'Quick response deleted'
            ]);

        }
    }

    /**
     * Add new offer
     */
    public function sendOffer( Request $request )
    {
        if ( $request->ajax() ) {

            $loggedIn = session()->get('user');
            $user     = session()->get('active_user');

            try {

                $request->validate([
                    'gig'           => 'required|exists:gig,GIG_ID',
                    'payment_type'  => 'required|exists:payment_types,ID',
                    'description'   => 'required',
                    'revision'      => 'required',
                    'delivery'      => 'required',
                    'price'         => 'required',
                ]);

                $offer = new Quotation();

                $offer->GIG_ID          = $request->gig;
                $offer->FREELANCER_ID   = $loggedIn->freelancer->FREELANCER_ID;
                $offer->SENT_TO         = $user->USER_ID;
                $offer->PAYMENT_TYPE_ID = $request->payment_type;
                $offer->DESCRIPTION     = $request->description;
                $offer->REVISION        = $request->revision;
                $offer->DELIVERY        = $request->delivery;
                $offer->PRICE           = $request->price;
                $offer->EXPIRES         = $request->expires;
                $offer->REQUIREMENTS    = $request->requirements ?? 0;

                $offer->save();

                //merge value with request
                $request->merge([
                    'replied_to' => $user->USER_ID,
                    'message'    => 'Here\'s your Custom Offer ',
                    'offer'      => $offer->QUOTE_ID
                ]);

                //call store method to store new message
                $this->store( $request );

                return response([
                    'message' => 'offer created',
                    'status'  => 'success',
                    'id'      => $offer->ID
                ]);

            } catch (\Exception $e) {
                return response([
                    'message' => $e->getMessage(),
                    'status'  => 'error'
                ],300);
            }

        }
    }

    /**
     * Quotation accept
     */
    public function offerAccept( Request $request )
    {
        if ( $request->ajax() ) {

            $loggedIn = session()->get('user');

            $id    = $request->accept_offer ?? $request->withdraw_offer;

            $offer = Quotation::where('QUOTE_ID',$id)->first();

            if ( $request->accept_offer ) {
                $offer->STATUS = 1;
            } else {
                $offer->STATUS = 2;
            }

            $offer->save();

            event(new MessageNotification(
                $loggedIn->USER_ID
            ));

        }
    }

    /**
     * Delete Conversation
     */
    public function deleteConversation( Request $request )
    {
        if ( $request->ajax() ) {

            $loggedIn = session()->get('user');
            $user     = session()->get('active_user');

            $query = Chat::where(function( $query ) use( $loggedIn,$user ){
                $query->where('sent_by', $user->USER_ID);
                $query->where('replied_to',$loggedIn->USER_ID);
            })->orWhere(function($query) use( $loggedIn,$user ){
                $query->where('sent_by',$loggedIn->USER_ID);
                $query->where('replied_to',$user->USER_ID);
            })->delete();

            event(new MessageNotification(
                $loggedIn->USER_ID
            ));
        }
    }

    /**
     * Change reading status
     */
    public function changeReadingStatus(Request $request)
    {
        if ( $request->ajax() ) {

            Chat::where('sent_by',$request->sender)
                ->where('replied_to',session('user')->USER_ID)
                ->update(['unread' => $request->unread]);

            event(new MessageNotification(
                session('user')->USER_ID
            ));
        }
    }

}
