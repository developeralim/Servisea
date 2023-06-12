<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'freelancer';
    protected $fillable = [
        'USER_ID',
        'F_LEVEL',
        'F_DESCRIPTION',
        'F_SINCE',
        'F_LANGUAGE',
        ];

}
