<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Request extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = "job";

    protected $fillable = [
            'JR_ID',
            'JR_TITLE',
            'JR_DESCRIPTION',
            'JR_DATEPOSTED',
            'JR_REMUNERATION',
            'CATEGORY_ID',
            'JR_STATUS',
            'POSTED_BY_USER',
            'JR_DELIVERYDATE',
            'JR_ATTACHMENT',
            ];

}
