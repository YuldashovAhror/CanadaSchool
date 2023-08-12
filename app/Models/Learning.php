<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'icon',
        'name_uz',
        'name_ru',
        'name_en',
        'discription_uz',
        'discription_ru',
        'discription_en',
        'alt_uz',
        'alt_ru',
        'alt_en',
        'photo_discription_uz',
        'photo_discription_ru',
        'photo_discription_en',
    ];
}
