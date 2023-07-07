<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'employee';
    protected $fillable = [
        'EMPLOYEE_ID',
        'USER_ID',
        'DEPARTMENT_ID',
        'EMP_LEVEL',
        'EMP_SINCE',
        'EMP_SALARY',
        'created_at',
        'updated_at',
        ];

}
