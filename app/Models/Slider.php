<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'alt_uz',
        'alt_ru',
        'alt_en',
        'photo_discription_uz',
        'photo_discription_ru',
        'photo_discription_en',
    ];
}
