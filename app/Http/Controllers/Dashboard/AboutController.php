<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::find(1);
        return view('dashboard.about.crud', [
            'about'=>$about
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'link' => 'required',
            'discription_uz' => 'nullable',
            'discription_ru' => 'nullable',
            'discription_en' => 'nullable',
        ]);
        About::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
