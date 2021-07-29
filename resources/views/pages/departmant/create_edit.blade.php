@extends('layouts.main')

@section('title', isset($departmant) ? 'Edit-' . $departmant->name : 'Create departmant')

@section('custom-css')
@endsection

@section('content')
    @include('includes.error')

    <form method="POST"
        @if (isset($departmant))
            action="{{ route('departmants.update', $departmant->id) }}"
        @else
            action="{{ route('departmants.store') }}"
        @endif>

        @csrf
        @isset($departmant)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="departmant_name" class="form-label">Name</label>
            <input name="name"
                value="{{ isset($departmant) ? $departmant->name : null }}"
                type="text" class="form-control" id="departmant_name" placeholder="Name" >
        </div>
        <div>
            <button type="submit" class="btn btn-success">{{ isset($departmant) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection

@section('custom-js')
@endsection