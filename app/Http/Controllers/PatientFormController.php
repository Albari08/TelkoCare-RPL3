<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class FormInsertController extends Controller
{
    //
    public function store(Request $request)
    {
        $patient = Patient::create($request->all());

        return redirect('/patients');
    }

}