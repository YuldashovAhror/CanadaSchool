<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\BaseController;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('dashboard.news.crud', [
            'news'=>$news
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'type_uz' => 'nullable',
            'type_ru' => 'nullable',
            'type_en' => 'nullable',
            'day' => 'nullable',
            'month' => 'nullable',
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
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/news');
        }
        News::create($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'type_uz' => 'nullable',
            'type_ru' => 'nullable',
            'type_en' => 'nullable',
            'day' => 'nullable',
            'month' => 'nullable',
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
            $this->fileDelete('\News', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/news');
        }
        News::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\News', $id, 'photo');
        News::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
