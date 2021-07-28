@extends('layouts.main')

@section('title', isset($departmant) ? 'Edit' . $departmant->name : 'Create departmant')

@section('custom-css')
@endsection

@section('content')
    @include('includes.error')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
        @if (isset($departmant))
            action="{{ route('departmants.update', $departmant) }}"
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
            <button type="submit">Create</button>
        </div>
    </form>
@endsection

@section('custom-js')
@endsection