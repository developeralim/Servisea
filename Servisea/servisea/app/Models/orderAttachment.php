<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderAttachment extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'order_attachment';
    protected $fillable = [
        'ATTACH_ID',
        'ORDER_ID',
        'MEDIA_PATH',
        ];





}
