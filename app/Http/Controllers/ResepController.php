<?php

namespace App\Http\Controllers;
// untuk resep
use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\ResepDetail;
use App\Models\ResepDetailTemp;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::all();

        return view('resep.index', compact('resep'));
    }

    public function create()
    {
        return view('resep.tambah');
    }

    public function show(Resep $resep)
    {
        $resepDetails = $resep->resepDetails;

        return view('resep.show', compact('resep', 'resepDetails'));
    }

    public function edit(ResepDetailTemp $resep)
    {
        return $resep;
    }

    public function store(Request $request)
    {
        // Get all ResepDetailTemp records
        $resep_detail_temp_records = ResepDetailTemp::all();

        if(count($resep_detail_temp_records) == 0)
        {
            return response()->json([
                'status' => false,
                "message" => "Failed to store Data"
            ]);
        }

        // Create a new Resep record
        $resep = Resep::create([
            'kode_resep' => $this->generateCode(),
            'nama_pasien' => $request->nama_pasien,
        ]);

        // Create corresponding ResepDetail records based on ResepDetailTemp records
        foreach ($resep_detail_temp_records as $resep_detail_temp_record) {
            // Create a new ResepDetail record and copy data from ResepDetailTemp record
            $resep_detail_data = $resep_detail_temp_record->toArray();
            unset($resep_detail_data['id'], $resep_detail_data['created_at'], $resep_detail_data['updated_at']);

            // Set the resep_id before creating the ResepDetail record
            $resep_detail_data['resep_id'] = $resep->id;
            $resep_detail = ResepDetail::create($resep_detail_data);
        }

        // Delete all ResepDetailTemp records
        ResepDetailTemp::truncate();

        // Return a success response or any other relevant data
        return response()->json([
            'status' => true,
            "message" => "Resep Created Successfully"
        ]);
    }



    public function update(Request $request, ResepDetailTemp $resep)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_obat' => 'required|string',
            'nama_alias' => 'required|string',
            'rute' => 'required|string',
            'qty' => 'required|numeric',
            'aturan_pakai' => 'required|string',
        ]);

        // Update the ResepDetailTemp instance with the validated data
        $resep->update($validatedData);

        // Return the updated ResepDetailTemp instance with validated data
        return $resep;
    }

    public function getObat()
    {
        $list = ResepDetailTemp::all();

        return $list;
    }

    public function addObat(Request $request)
    {
        $temp = ResepDetailTemp::create([
            'nama_obat' => $request->nama_obat,
            'nama_alias_obat' => $request->nama_alias,
            'rute' => $request->rute,
            'qty' => $request->qty,
            'aturan_pakai' => $request->aturan_pakai,
        ]);

        return $temp;
    }

    public function removeObat(Request $request, $id = null)
    {
        $resep = ResepDetailTemp::where('id', $id);
        $resep->delete();

        return true;
    }

    public function generateCode()
    {
        // Get the last record from the Resep model
        $lastResep = Resep::orderBy('id','desc')->first();

        if (!$lastResep) {
            // If there are no records, set the code to "RB00001"
            $code = 'RB00001';
        } else {
            // Extract the number part from the code and increment it by one
            $number = (int)substr($lastResep->kode_resep, 2) + 1;
            // Format the number with leading zeros
            $formattedNumber = str_pad($number, 5, '0', STR_PAD_LEFT);
            // Concatenate the prefix "RB" with the formatted number
            $code = 'RB' . $formattedNumber;
        }

        return $code;
    }
}
