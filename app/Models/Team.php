<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name_uz',
        'name_ru',
        'name_en',
        'position_uz',
        'position_ru',
        'position_en',
        'email',
        'alt_uz',
        'alt_ru',
        'alt_en',
        'photo_discription_uz',
        'photo_discription_ru',
        'photo_discription_en',
    ];
}
