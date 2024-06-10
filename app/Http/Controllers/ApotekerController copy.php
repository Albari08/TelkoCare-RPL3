<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\ResepDetail;
use App\Models\ResepDetailTemp;

class ApotekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resep = Resep::where('status', '=', 'Purchased')->get();
        return view('apoteker.index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resep = Resep::find($id);
        $resepDetails = $resep->resepDetails;

        return view('apoteker.edit', compact('resep', 'resepDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $validated = $request->validate([
                'status' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        $detail_ids = $request->detail_id;
        $status = $request->status;
        
        // if all status array is available then update the status of the resep to done
        foreach ($status as $key => $value) {
            $resep_detail = ResepDetail::find($detail_ids[$key]);
            $resep_detail->status = $value;
            $resep_detail->save();
        }

        if (in_array('Not Available', $status)) {
            $resep = Resep::find($id);
            $resep->status = 'Review';
            $resep->save();
        } else {
            $resep = Resep::find($id);
            $resep->status = 'Done';
            $resep->save();
        }

        return redirect()->route('apoteker.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
