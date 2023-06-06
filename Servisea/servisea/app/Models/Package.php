<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'package';
    protected $fillable = [
        'PACKAGE_NAME',
        'PRICE',
        'GIG_ID',
        'PACKAGE_DESCRIPTION',
        'DELIVERY_DAYS',
        'REVISION',
        'PACKAGE_STATUS',
        ];


}
