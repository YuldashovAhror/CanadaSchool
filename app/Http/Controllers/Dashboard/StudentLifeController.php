<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StudentLife;
use Illuminate\Http\Request;

class StudentLifeController extends BaseController
{
    public function index()
    {
        $studentlifes = StudentLife::orderBy('id', 'desc')->get();
        return view('dashboard.studentlife.crud', [
            'studentlifes'=>$studentlifes
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
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
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/studentlife');
        }
        if (!empty($validatedData['icon'])) {
            $validatedData['icon'] = $this->photoSave($validatedData['icon'], 'image/studentlife');
        }
        StudentLife::create($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
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
            $this->fileDelete('\StudentLife', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/studentlife');
        }
        if (!empty($validatedData['icon'])) {
            $this->fileDelete('\StudentLife', $id, 'icon');
            $validatedData['icon'] = $this->photoSave($validatedData['icon'], 'image/studentlife');
        }
        StudentLife::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\StudentLife', $id, 'photo');
        $this->fileDelete('\StudentLife', $id, 'icon');
        StudentLife::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
