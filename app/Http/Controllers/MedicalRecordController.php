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
        $record = MedicalRecord::create($request->all());
        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = MedicalRecord::with('notes', 'interventions')->find($id);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        $record = MedicalRecord::find($id);
        $record->update($request->all());
        return response()->json($record);
    }

    public function destroy($id)
    {
        MedicalRecord::destroy($id);
        return response()->json(null, 204);
    }
}
