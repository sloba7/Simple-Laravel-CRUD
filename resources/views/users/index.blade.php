@extends('layouts.app')

@section('content')
<h1 class="text-center mt-3">Users Management</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary mb-5 mt-2">Create User</a>

@if (!empty($searchMessage))
<div class="alert alert-warning" >
<p class="m-0">{{ $searchMessage }}</p>
</div>
@endif


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('users.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" name="name" placeholder="Search by name..." value="{{ $request->input('name') }}">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="{{ route('users.index') }}" class="btn btn-info">Clear Search</a>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th><a href="{{ route('users.index', ['sort_field' => 'name', 'sort_order' => ($request->input('sort_field') === 'name' && $request->input('sort_order') === 'asc') ? 'desc' : 'asc']) }}">Name</a></th>
            <th>Email</th>
            <th>Username</th>
            <th>Lastname</th>
            <th>City</th>
            <th>Zipcode</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ $user->zipcode }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->website }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($users->hasPages())
<nav aria-label="...">
  <ul class="pagination">
  <li class="page-item   @if ($users->onFirstPage()) disabled  @else   @endif">
      <a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a>
    </li>

    <li class="page-item @if ($users->hasMorePages()) @else disabled  @endif">
      <a class="page-link" href="{{ $users->nextPageUrl() }}" >Next</a>
    </li>
  </ul>
</nav>
@endif
@endsection

