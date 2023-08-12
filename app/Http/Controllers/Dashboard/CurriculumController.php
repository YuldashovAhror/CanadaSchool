<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends BaseController
{
    public function index()
    {
        $curriculum = Curriculum::find(1);
        return view('dashboard.curriculum.crud', [
            'curriculum'=>$curriculum
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'discription_uz' => 'nullable',
            'discription_ru' => 'nullable',
            'discription_en' => 'nullable',
            'alt_uz' => 'nullable',
            'alt_ru' => 'nullable',
            'alt_en' => 'nullable',
            'photo_discription_uz' => 'nullable',
            'photo_discription_ru' => 'nullable',
            'photo_discription_en' => 'nullable',
        ]);
        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\Curriculum', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/curriculum');
        }
        Curriculum::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
