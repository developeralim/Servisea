<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'department';
    protected $fillable = [
        'DEPARTMENT_ID',
        'DEPARTMENT_NAME',
        ];


}
