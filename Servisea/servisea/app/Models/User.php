<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
}
