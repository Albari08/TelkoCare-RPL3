<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Full CRUD operations for Admin
    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins);
    }

    public function create()
    {
        // Return view to create a new admin
    }

    public function store(Request $request)
    {
        $admin = Admin::create($request->all());
        return response()->json($admin, 201);
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        return response()->json($admin);
    }

    public function edit($id)
    {
        // Return view to edit an admin
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->update($request->all());
        return response()->json($admin);
    }

    public function destroy($id)
    {
        Admin::destroy($id);
        return response()->json(null, 204);
    }
}
