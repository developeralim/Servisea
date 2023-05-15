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
            'JR_TITLE',
            'JR_DESCRIPTION',
            'JR_TITLE',
            'JR_DESCRIPTION',
            'CATEGORY_ID',
            'POSTED_BY_USER',
            ];

}
