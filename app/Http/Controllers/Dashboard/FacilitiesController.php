<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Facilities;
use Illuminate\Http\Request;

class FacilitiesController extends BaseController
{
    public function index()
    {
        $facilities = Facilities::orderBy('id', 'desc')->get();
        return view('dashboard.facilities.crud', [
            'facilities'=>$facilities
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
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
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/facilities');
        }
        Facilities::create($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
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
            $this->fileDelete('\Facilities', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/facilities');
        }
        Facilities::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\Facilities', $id, 'photo');
        Facilities::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
