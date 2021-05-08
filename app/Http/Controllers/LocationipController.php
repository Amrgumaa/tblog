<?php

namespace App\Http\Controllers;

use App\Locationip;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class LocationipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip = request()->header('X-Forwarded-For');
        $data = Location::get($ip);
        dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locationip  $locationip
     * @return \Illuminate\Http\Response
     */
    public function show(Locationip $locationip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locationip  $locationip
     * @return \Illuminate\Http\Response
     */
    public function edit(Locationip $locationip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locationip  $locationip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locationip $locationip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locationip  $locationip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locationip $locationip)
    {
        //
    }
}
