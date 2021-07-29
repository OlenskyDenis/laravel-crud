<?php

namespace App\Http\Controllers;

use App\Models\Departmant;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('pages.employee.index',compact([
            'employees'
        ]));
    }

    public function create()
    {
        $departmants = Departmant::all();
        $gender_list = ['Male','Female'];
        
        return view('pages.employee.create_edit', compact([
            'departmants',
            'gender_list'
        ]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:employees'],
            'surname' => ['required'],
            'salary'  => ['required', 'numeric'],
            'departments' => ['required'],
        ]);

        Employee::create($request->only([
            'name',
            'surname',
            'patronymic',
            'gender',
            'salary',
            'departments'
        ]));

        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        $departmants = Departmant::all();
        $gender_list = ['Male','Female'];

        return view('pages.employee.create_edit',compact([
            'employee',
            'departmants',
            'gender_list'
        ]));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'salary'  => ['required'],
            'departments' => ['required'],
        ]);

        $employee->update($request->only([
            'name',
            'surname',
            'patronymic',
            'gender',
            'salary',
            'departments'
        ]));

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        
        return redirect()->route('employees.index');
    }
}
