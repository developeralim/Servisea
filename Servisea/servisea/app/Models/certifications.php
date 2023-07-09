<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certifications extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "certification";
    protected $fillable = [
        'CERTIFICATION_ID',
        'FREELANCER_ID',
        'CERTIFICATION_NAME',
        'PROVIDER_NAME',
        'DATE_EARNED',
        'CERTIFICATION_LINK',
    ];
}
