<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

       // Filter by name
    $searchMessage = '';
    if ($request->filled('name')) {
        $users->where('name', 'like', '%' . $request->input('name') . '%');

        // Check if there are no search results
        $searchResults = $users->simplePaginate($perPage, ['*'], 'page', $page);
        if ($searchResults->isEmpty()) {
            $searchMessage = 'No results found.';
        }
    }

        // Sorting
        $sortField = $request->input('sort_field', 'name');
        $sortOrder = $request->input('sort_order', 'asc');
        $users->orderBy($sortField, $sortOrder);


        // Pagination
        $users = $users->paginate($perPage, ['*'], 'page', $page);

        return view('users.index', compact('users', 'request', 'searchMessage'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'lastname' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'website' => 'required',
        ]);

        // Create the user
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|unique:users,username,' . $user->id,
            'lastname' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'website' => 'required',
        ]);

        // Update the user
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user){


        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
