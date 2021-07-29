@extends('layouts.main')

@section('title', 'Departmants')

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
            <h2>Departmants <b>Details</b></h2>
            <a class="btn btn-success" href="{{route('departmants.create')}}">Create new</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Employees count</th>
                <th>Top salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departmants as $departmant)
                <tr>
                    <td>{{$departmant->name}}</td>
                    <td>{{$departmant->employees_count ?? 'none'}}</td>
                    <td>{{$departmant->top_salary ?? 'none'}}</td>
                    <td style="display: flex; justify-content: space-evenly;">
                        <a class="btn btn-warning disabled" href="{{ route('departmants.edit', $departmant->id) }}">View</a>
                        <a class="btn btn-primary" href="{{ route('departmants.edit', $departmant->id) }}">Edit</a>

                        <form method="POST" action="{{ route('departmants.destroy', $departmant->id) }}">
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