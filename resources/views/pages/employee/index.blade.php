@extends('layouts.main')

@section('title', 'Employees')

@section('custom-css')
    <style>
        .btn{
            min-width: 100px; 
        }
        .btn-success{
            margin: 5px;
        }
    </style>
@endsection

@section('content')
    <div>
        <div style="display:flex; justify-content: space-between;">
            <h2>Employees <b>Details</b></h2>
            <a class="btn btn-success" href="{{route('employees.create')}}">Create new</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Patronymic</th>
                <th>Gender</th>
                <th>Salary</th>
                <th>Departments</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->surname}}</td>
                    <td>{{$employee->patronymic}}</td>
                    <td>{{$employee->gender}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>
                        {{-- @foreach(explode('[]', $employee->departments) as $department) 
                            {{ $department }}
                        @endforeach --}}
                        
                        @foreach ($employee->departments as $department)
                            <span class="bg-primary text-white rounded-pill" style="margin: 0 5px;">{{ $department }}</span>
                        @endforeach
                    </td>
                    <td style="display: flex; justify-content: space-evenly;">
                        <a class="btn btn-warning disabled" href="{{ route('employees.edit', $employee->id) }}">View</a>
                        <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Edit</a>

                        <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Delete</button>
                        </form>
                    </td>
                </tr>    
            @endforeach
        </tbody>
    </table>
@endsection

@section('custom-js')
@endsection