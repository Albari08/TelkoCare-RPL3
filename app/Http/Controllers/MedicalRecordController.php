<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $records = MedicalRecord::all();
        return response()->json($records);
    }

    public function store(Request $request)
    {
        if (auth()->user()->isDoctor()) {
            $record = MedicalRecord::create($request->all());
            return response()->json($record, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }

    public function show($id)
    {
        $record = MedicalRecord::with('notes', 'interventions')->find($id);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->isDoctor()) {
            $record = MedicalRecord::find($id);
            $record->update($request->all());
            return response()->json($record);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }

    public function destroy($id)
    {
        if (auth()->user()->isAdmin()) {
            MedicalRecord::destroy($id);
            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
