<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dispute extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'dispute';
    protected $fillable = [

        'DISPUTE_ID',
        'USER_ID',
        'EMPLOYEE_ID',
        'DEPARTMENT_ID',
        'DISPUTE_TITLE',
        'FREELANCER_ID',
        'DISPUTE_DESCRIPTION',
        'DISPUTE_SOLUTION',
        'DISPUTE_DATECREATED',
        'DISPUTE_STATUS',
        'created_at',
        'updated_at',
        'ORDER_ID'

        ];


}
