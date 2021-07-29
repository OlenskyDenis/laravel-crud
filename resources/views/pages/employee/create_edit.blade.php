@extends('layouts.main')

@section('title', isset($employee) ? 'Edit-' . $employee->name : 'Create employee')

@section('custom-css')
@endsection

@section('content')

    @include('includes.error')

    <form method="POST"
        @if (isset($employee))
            action="{{ route('employees.update', $employee->id) }}"
        @else
            action="{{ route('employees.store') }}"
        @endif>

        @csrf
        @isset($employee)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="employee_name" class="form-label">Name</label>
            <input name="name"
                value="{{ isset($employee) ? $employee->name : null }}"
                type="text" class="form-control" id="employee_name" placeholder="Name" >
        </div>

        <div class="mb-3">
            <label for="employee_surname" class="form-label">Surname</label>
            <input name="surname"
                value="{{ isset($employee) ? $employee->surname : null }}"
                type="text" class="form-control" id="employee_surname" placeholder="Surname" >
        </div>

        <div class="mb-3">
            <label for="employee_patronymic" class="form-label">Patronymic</label>
            <input name="patronymic"
                value="{{ isset($employee) ? $employee->patronymic : null }}"
                type="text" class="form-control" id="employee_patronymic" placeholder="patronymic" >
        </div>

        <div class="mb-3">
            <label for="employee_gender" class="form-label">Gender</label>
            <select name="gender" id="employee_gender">
                @foreach ($gender_list as $gender)
                    <option value="{{ strtolower($gender) }}" 
                        @isset($employee)
                            {{ $employee->gender == strtolower($gender) ? 'selected' : ''}}
                        @endisset
                    >{{ $gender }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="employee_salary" class="form-label">Salary</label>
            <input name="salary"
                value="{{ isset($employee) ? $employee->salary : null }}"
                type="text" class="form-control" id="employee_salary" placeholder="Salary" >
        </div>

        <label for="employee_department">Choose departments:</label>

        <select name="departments[]" id="employee_department" multiple>
            @foreach ($departmants as $departmant)
                <option value="{{ $departmant->name }}"
                    @isset($employee)
                        @foreach ($employee->departments as $employee_department)
                            @if ($departmant->name == $employee_department)
                                selected
                            @endif
                        @endforeach
                    @endisset
                >{{ $departmant->name }}</option>
            @endforeach
        </select>

        <div>
            <button type="submit" class="btn btn-success">{{ isset($employee) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection

@section('custom-js')
@endsection