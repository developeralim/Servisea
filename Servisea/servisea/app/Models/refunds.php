<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refunds extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'refund';
    protected $fillable = [
        'REFUND_ID',
        'REFUND_STATUS',
        'REFUND_DATE',
        'REFUND_AMOUNT',
        'ORDER_ID',

        ];

}
