<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigMedia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'gig_media';
    protected $fillable = [
        'GIG_ID',
        'MEDIA_ID',
        'MEDIA_PATH',
    ];


}
