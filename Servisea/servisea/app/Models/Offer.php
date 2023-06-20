<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offer extends Model
{
    use HasFactory;

    public $primaryKey = 'ID';

    public function gig() : HasOne
    {
        return $this->hasOne(Gig::class,'GIG_ID','GIG_ID');
    }
}
