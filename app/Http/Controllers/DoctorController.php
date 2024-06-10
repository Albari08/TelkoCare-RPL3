<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // CRU operations for Doctor
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    public function create()
    {
        // Return view to create a new doctor
    }

    public function store(Request $request)
    {
        $doctor = Doctor::create($request->all());
        return response()->json($doctor, 201);
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return response()->json($doctor);
    }

    public function edit($id)
    {
        // Return view to edit a doctor
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->update($request->all());
        return response()->json($doctor);
    }

    public function destroy($id)
    {
        return response()->json(['error' => 'Unauthorized'], 403); // Doctors cannot delete records
    }
}
