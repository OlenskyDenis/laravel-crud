@extends('layouts.main')

@section('title', 'Home')

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
            <h2>Home</h2>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                @foreach ($departments as $department)
                    <th>{{ $department->name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->name .' '. $employee->surname}}</td>

                    @foreach ($departments as $department)
                        <td>
                            @foreach ($employee->departments as $employee_department)
                                @if ($employee_department == $department->name)
                                    ✓
                                @endif
                            @endforeach
                        </td>
                    @endforeach
                </tr>    
            @endforeach
        </tbody>
    </table>
@endsection

@section('custom-js')
@endsection
