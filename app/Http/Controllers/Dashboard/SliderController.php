<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends BaseController
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('dashboard.slider.crud', [
            'sliders'=>$sliders
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|mimes:mp4,avi,mov,wmv,jpeg,png,jpg,gif|max:20480',
            'alt_uz' => 'nullable',
            'alt_ru' => 'nullable',
            'alt_en' => 'nullable',
            'photo_discription_uz' => 'nullable',
            'photo_discription_ru' => 'nullable',
            'photo_discription_en' => 'nullable',
        ]);
        if (!empty($validatedData['photo'])) {
            $validatedData['photo'] = $this->fileSave($validatedData['photo'], 'image/slider');
        }
        Slider::create($validatedData);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'mimes:mp4,avi,mov,wmv,jpeg,png,jpg,gif|max:20480',
            'alt_uz' => 'nullable',
            'alt_ru' => 'nullable',
            'alt_en' => 'nullable',
            'photo_discription_uz' => 'nullable',
            'photo_discription_ru' => 'nullable',
            'photo_discription_en' => 'nullable',
        ]);
        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\Slider', $id, 'photo');
            $validatedData['photo'] = $this->fileSave($validatedData['photo'], 'image/slider');
        }
        Slider::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\Slider', $id, 'photo');
        Slider::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
