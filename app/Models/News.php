<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'type_uz',
        'type_ru',
        'type_en',
        'day',
        'month',
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
