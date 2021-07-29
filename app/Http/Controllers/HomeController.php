<?php

namespace App\Http\Controllers;

use App\Models\Departmant;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        $departments = Departmant::all();

        return view('pages.home', compact([
            'employees',
            'departments'
        ]));
    }
}
