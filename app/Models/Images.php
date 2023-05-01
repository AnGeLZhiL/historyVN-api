<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    /*
     * public function user() : HasOne{
        return $this->hasOne(User::class, 'image_id', 'id_image');
    }
     */
}
