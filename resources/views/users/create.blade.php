@extends('layouts.app')

@section('content')
<h1 class="text-center">Create User</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">

    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
    </div>
    <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ old('zipcode') }}">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Create</button>
</form>
@endsection
