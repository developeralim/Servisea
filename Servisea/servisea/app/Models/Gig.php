<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'gig';
    protected $fillable = [
        'GIG_ID',
        'CATEGORY_ID',
        'FREELANCER_ID',
        'GIG_NAME',
        'GIG_DESCRIPTION',
        'GIG_REQUIREMENTS',
        'GIG_STATUS',
        ];

}
