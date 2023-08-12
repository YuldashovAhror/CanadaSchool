<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Learning;
use Illuminate\Http\Request;

class LearningController extends BaseController
{
    public function index()
    {
        $learnings = Learning::orderBy('id', 'desc')->get();
        return view('dashboard.learning.crud', [
            'learnings'=>$learnings
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
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/learning');
        }
        if (!empty($validatedData['icon'])) {
            $validatedData['icon'] = $this->photoSave($validatedData['icon'], 'image/learning');
        }
        Learning::create($validatedData);
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
            $this->fileDelete('\Learning', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/learning');
        }
        if (!empty($validatedData['icon'])) {
            $this->fileDelete('\Learning', $id, 'icon');
            $validatedData['icon'] = $this->photoSave($validatedData['icon'], 'image/learning');
        }
        Learning::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\Learning', $id, 'photo');
        $this->fileDelete('\Learning', $id, 'icon');
        Learning::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
