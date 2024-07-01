<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('auth');
    //    $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show']]);
    //    $this->middleware('permission:create-user', ['only' => ['create','store']]);
    //    $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
    //    $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    // }
    // Display a listing of the users.
    public function index()
    {
        // Retrieve all users from the database.
        $users = User::all();

        // Return the user index view with the retrieved data.
        return view('admin.users.index', compact('users'));
    }

    // Show the form for creating a new user.
    public function create()
    {
        // Return the user create view.
        return view('admin.users.create');
    }

    // Store a newly created user in the database.
    public function store(Request $request)
    {
        try {
            // Validate the form data.
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                // Add more validation rules for other attributes as needed.
            ]);

            // Create a new user with the validated data.
            User::create($validatedData);

            // Redirect to the user index page with a success message.
            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., database errors).
            return redirect()->route('admin.users.create')->with('error', 'Failed to create user. ' . $e->getMessage());
        }
    }

    // Display the specified user.
    public function show(User $user)
    {
        // Return the user show view with the specified user.
        return view('admin.users.show', compact('user'));
    }

    // Show the form for editing the specified user.
    public function edit(User $user)
    {
        // Return the user edit view with the specified user.
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user in the database.
    public function update(Request $request, User $user)
    {
        try {
            // Validate the form data.
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:8',
                // Add more validation rules for other attributes as needed.
            ]);

            // Update the user with the validated data.
            $user->update($validatedData);

            // Redirect to the user index page with a success message.
            return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., database errors).
            return redirect()->route('admin.users.edit', $user)->with('error', 'Failed to update user. ' . $e->getMessage());
        }
    }

    // Remove the specified user from the database.
    public function destroy(User $user)
    {
        try {
            // Delete the user from the database.
            $user->delete();

            // Redirect to the user index page with a success message.
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., database errors).
            return redirect()->route('admin.users.index')->with('error', 'Failed to delete user. ' . $e->getMessage());
        }
    }
}
