<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'payment';
    protected $fillable = [
        'PAYMENT_ID',
        'PAYMENT_DATE',
        'PAYMENT_METHOD',
        'PAYMENT_AMOUNT',
        'PAYMENT_CURRENCY',
        'PAYMENT_STATUS'
    ];

}
