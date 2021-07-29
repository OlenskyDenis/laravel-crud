<?php

namespace App\Http\Controllers;

use App\Models\Departmant;
use Illuminate\Http\Request;

class DepartmantController extends Controller
{
    public function index()
    {
        $departmants = Departmant::all();

        return view('pages.departmant.index',[
            'departmants' => $departmants,
        ]);
    }

    public function create()
    {
        return view('pages.departmant.create_edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:departmants', 'max:255'],
        ]);

        Departmant::create($request->only(['name']));

        return redirect()->route('departmants.index');
    }

    public function show(Departmant $departmant)
    {
        //
    }

    public function edit(Departmant $departmant)
    {
        return view('pages.departmant.create_edit',[
            'departmant' => $departmant
        ]);
    }

    public function update(Request $request, Departmant $departmant)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $departmant->update($request->only(['name']));

        return redirect()->route('departmants.index');
    }

    public function destroy(Departmant $departmant)
    {
        $departmant->delete();
        
        return redirect()->route('departmants.index');
    }
}
