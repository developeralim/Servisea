<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMedia extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'MEDIA_ID';

    public function size(){

        $bytes = $this->SIZE;

        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = 0;

        while ($bytes >= 1024 && $index < count($units) - 1) {
            $bytes /= 1024;
            $index++;
        }

        return round($bytes, 2) . ' ' . $units[$index];
    }

    function preview() {

        list( $mime,$ext ) = explode('/',$this->MIME);

        switch ($mime) {
            case 'image':
                // Display an image preview
                echo '<a target="_blank" href="'.$this->URL.'"><img src="' . $this->URL . '" alt="'. $this->NAME .'"></a>';
                break;
            case 'video':
                // Display a video preview
                echo '<video src="' . $this->URL . '" controls></video>';
                break;
            case 'application':
                // Display a PDF preview
                echo '<div class="blank">'.$ext.'</div>';
                break;
            default:
                // Display a generic preview for other file types
                break;
    }
}
}
