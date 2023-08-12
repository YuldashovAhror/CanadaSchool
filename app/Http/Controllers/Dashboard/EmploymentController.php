<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function index()
    {
        $employments = Employment::orderBy('id', 'desc')->get();
        return view('dashboard.employment.crud', [
            'employments'=>$employments
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_uz' => 'nullable',
            'position_ru' => 'nullable',
            'position_en' => 'nullable',
        ]);
        Employment::create($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_uz' => 'nullable',
            'position_ru' => 'nullable',
            'position_en' => 'nullable',
        ]);
        Employment::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Data uploated successfully.');
    }

    public function destroy($id)
    {
        Employment::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
