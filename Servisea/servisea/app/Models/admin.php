<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "admin";
    protected $fillable = [
        'ADMIN_USERNAME',
        'ADMIN_EMAIL',
        'ADMIN_PASSWORD',
        'ADMIN_STATUS',
        'ADMIN_LEVEL',
    ];

}
