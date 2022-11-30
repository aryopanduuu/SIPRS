<?php

namespace App\Http\Controllers;

use App\Models\UserBooking;
use App\Http\Requests\StoreUserBookingRequest;
use App\Http\Requests\UpdateUserBookingRequest;

class UserBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUserBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function show(UserBooking $userBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBooking $userBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserBookingRequest  $request
     * @param  \App\Models\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserBookingRequest $request, UserBooking $userBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBooking $userBooking)
    {
        //
    }
}
