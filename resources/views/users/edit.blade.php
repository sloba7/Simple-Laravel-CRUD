@extends('layouts.app')

@section('content')
<h1 class="text-center" >Edit User</h1>

@if($errors-> any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>
</div>

@endif


<form action="{{ route('users.update', $user) }}" method="POST" >
    @csrf
    @method('PUT')

    <div class="form-group">
     <label for="name">Name</label>
     <input type="text" class="form-control" id="name" name='name' value="{{ old('name', $user->name) }}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name='email' value="{{ old('email', $user->email) }}">
    </div>

    <div class="form-group">
        <label for="email">Username</label>
        <input type="text" class="form-control" id="username" name='username' value="{{ old('username', $user->username) }}">
    </div>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" id="lastname" name='lastname' value="{{ old('lastname', $user->lastname) }}">
    </div>

    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="City" name='city' value="{{ old('city', $user->city) }}">
    </div>

    <div class="form-group">
        <label for="text">Zipcode</label>
        <input type="text" class="form-control" id="zipcode" name='zipcode' value="{{ old('zipcode', $user->zipcode) }}">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" class="form-control" id="phone" name='phone' value="{{ old('phone', $user->phone) }}">
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name='website' value="{{ old('phone', $user->website) }}">
    </div>
  <button type="text" class="btn btn-primary" >Update</button>
</form>
@endsection
