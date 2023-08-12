<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends BaseController
{
    public function index()
    {
        $teams = Team::orderBy('id', 'desc')->get();
        return view('dashboard.team.crud', [
            'teams'=>$teams
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_uz' => 'nullable',
            'position_ru' => 'nullable',
            'position_en' => 'nullable',
            'email' => 'nullable',
            'alt_uz' => 'nullable',
            'alt_ru' => 'nullable',
            'alt_en' => 'nullable',
            'photo_discription_uz' => 'nullable',
            'photo_discription_ru' => 'nullable',
            'photo_discription_en' => 'nullable',
        ]);
        if (!empty($validatedData['photo'])) {
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/team');
        }
        Team::create($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_uz' => 'nullable',
            'position_ru' => 'nullable',
            'position_en' => 'nullable',
            'email' => 'nullable',
            'alt_uz' => 'nullable',
            'alt_ru' => 'nullable',
            'alt_en' => 'nullable',
            'photo_discription_uz' => 'nullable',
            'photo_discription_ru' => 'nullable',
            'photo_discription_en' => 'nullable',
        ]);
        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\Team', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/team');
        }
        Team::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\Team', $id, 'photo');
        Team::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
