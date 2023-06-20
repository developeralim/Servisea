<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Application extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'job_application';
    protected $fillable = [
        'FREELANCER_ID',
        'JR_ID',
        'JA_DATEAPPLIED',
        'JA_DESCRIPTION',
        'JA_PRICE',
        'JA_STATUS',
    ];
}
