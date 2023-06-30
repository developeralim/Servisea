<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modification extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = "modification";

    protected $fillable = [
        'MODIF_ID',
        'ORDER_ID',
        'MODIF_REQUIREMENTS',
        'created_at',
        'updated_at',
            ];

}
