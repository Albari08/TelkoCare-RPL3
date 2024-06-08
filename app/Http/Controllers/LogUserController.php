<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogUserRequest;
use App\Http\Requests\UpdateLogUserRequest;
use App\Models\LogUser;
use App\Models\User;

class LogUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminIndex($iduser)
    {
        $logUsers = LogUser::where('user_id', $iduser)->get();
        $pasien = User::where('id', $iduser)->first();
        return view('azkanoor.detail-aktivitas', compact('logUsers', 'pasien'));
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
    public function store(StoreLogUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LogUser $logUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogUser $logUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogUserRequest $request, LogUser $logUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogUser $logUser)
    {
        //
    }
}