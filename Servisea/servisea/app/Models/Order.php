<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'order';
    protected $fillable = [
        'ORDER_ID',
        'PACKAGE_ID',
        'USER_ID',
        'FREELANCER_ID',
        'PAYMENT_ID',
        'ORDER_AMOUNT',
        'ORDER_DATE',
        'ORDER_DUE',
        'ORDER_STATUS',
    ];
}
