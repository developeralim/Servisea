<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "address";

    protected $fillable = [
        'ADDRESS_STREET',
        'ADDRESS_CITY',
        'ADDRESS_STREET',
        'ADDRESS_STATE',
        'ADDRESS_DISTRICT',
        'ADDRESS_POSTALCODE',
        'ADDRESS_COUNTRY',
        'ADDED_BY_USER_ROLE',
        'ADDED_BY_USER_ID',
        ];

}
