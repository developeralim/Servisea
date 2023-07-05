<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Chat;
use App\Models\Freelancer;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'username',
    //     'email',
    //     'password',
    //     'phone',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     //'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public $timestamps = true;

    protected $table = "users";

    protected $fillable = [
            'USERNAME',
            'USER_ID',
            'USER_EMAIL',
            'USER_PASSWORD',
            'USER_TEL',
            'USER_LNAME',
            'USER_FNAME',
            'USER_IMG',
            'USER_DOB',
            'USER_GENDER',
            'USER_TEL',
            'ADDRESS_ID',
            'ACCOUNT_STATUS',
            'USER_ROLE',
            ];

    public function address() : HasOne
    {
        return $this->hasOne(Address::class,'ADDRESS_ID','ADDRESS_ID');
    }

    public function getLocaleTime( $format = 'Y-m-d H:i A' )
    {
        $timezones = config('timezone');
        $country  = $this->address->ADDRESS_COUNTRY;
        return  Carbon::now($timezones[ucfirst($country)])->format($format);
    }

    public function profileImage()
    {
        if ( $blob = $this->USER_IMG ) {
            echo 'data:image/png;base64,'.base64_encode($blob);
            return;
        }

        return null;
    }

    public function countUnread()
    {
        $loggedIn = session()->get('user');

        return Chat::where('sent_by',$this->USER_ID)
            ->where('replied_to',$loggedIn->USER_ID)
            ->where('unread',1)
            ->count();
    }

    public function getLastMessage()
    {
        $loggedIn = session()->get('user');

        // $message = Chat::where('sent_by',$this->USER_ID)
        //     ->where('replied_to',$loggedIn->USER_ID)


        $message = Chat::where(function( $query ) use( $loggedIn ){

            $query->where('sent_by',$this->USER_ID);
            $query->where('replied_to',$loggedIn->USER_ID);

        })->orWhere(function($query) use( $loggedIn ){

            $query->where('sent_by',$loggedIn->USER_ID);
            $query->where('replied_to',$this->USER_ID);

        })
        ->orderBy('sent_at','desc')
        ->first();

        $text = strlen( $message->text ) > 30 ? substr( $message->text ,0,30) . '....' : $message->text;


        $currentTime = Carbon::now(); // Current time
        $targetTime  = Carbon::parse($message->sent_at ); // Replace with your desired target time



        $diff  = $currentTime->diff($targetTime);
        $time  = 'Just now';

        if ( $diff->y > 0 ) {
            $time = sprintf("%s Year ago",$diff->y);
        } else if ( $diff->m > 0 ) {
            $time = sprintf("%s Month ago",$diff->m);
        }else if ( $diff->d > 0 ) {
            $time = sprintf("%s Day ago",$diff->d);
        }else if ( $diff->h > 0 ) {
            $time = sprintf("%s Hour ago",$diff->h);
        }else if ( $diff->i > 0 ) {
            $time = sprintf("%s Minute ago",$diff->i);
        }else if ( $diff->s > 30 ) {
            $time = sprintf("%s Second ago",$diff->s);
        }

        return (object) [
            'message' => $message->sent_by == $loggedIn->USER_ID ? "Me:$text" : $text,
            'time'    => $time
        ];

    }

    public function hasOrder()
    {
        $freelancer = Freelancer::where('USER_ID',$this->USER_ID)->first();

        if ( ! $freelancer ) return false;

        return Offer::where('STATUS',1)->count() !== 0;
    }
}
