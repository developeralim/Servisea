<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    
    public function sender() : HasOne 
    {
        return $this->hasOne(User::class,'USER_ID','sent_by');
    }

    public function media() {
        try {

            $mediaIds = unserialize($this->media);

            if ( ! is_array($mediaIds) ) {
                return [];
            }
    
            $media    = ChatMedia::whereIn('MEDIA_ID',$mediaIds )->get();

            return $media;

        } catch (\Exception $e) {
            
            return [];

        }
    }

    public function sentAt(){

       return Carbon::parse($this->sent_at)->format('M d, Y, h:i A');

    }

    public function offer()
    {
        return Offer::where('ID',$this->offer)->first();
    }
}
