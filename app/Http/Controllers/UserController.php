<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Read operations for User
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create()
    {
        // Return view to create a new user
    }

    public function store(Request $request)
    {
        return response()->json(['error' => 'Unauthorized'], 403); // Patients cannot create users
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function edit($id)
    {
        return response()->json(['error' => 'Unauthorized'], 403); // Patients cannot edit users
    }

    public function update(Request $request, $id)
    {
        return response()->json(['error' => 'Unauthorized'], 403); // Patients cannot update users
    }

    public function destroy($id)
    {
        return response()->json(['error' => 'Unauthorized'], 403); // Patients cannot delete users
    }
}
