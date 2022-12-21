<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Spesialis;
use App\Models\UserDokterSpesialis;
use Illuminate\Http\Request;
use Termwind\Components\Span;

class SpesialisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spesialis = Spesialis::get();
        return view('pages.spesialis', compact('spesialis'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spesl = Spesialis::where('id', $id)->firstOrFail();

        $datas = UserDokterSpesialis::where('spesialis_id', $id)->get();
        $datas = DB::table('user_dokter_spesialis as a')->join('spesialis as b', 'a.spesialis_id', '=', 'b.id')->where('a.spesialis_id', '=', $id)->get();
        $gelar = DB::table('user_dokter_spesialis as a')->join('spesialis as b', 'a.spesialis_id', '=', 'b.id')->where('a.spesialis_id', '=', $id)->take(1)->get();


        // return $datas

        return view('pages.spesialisdetails')->with('datas', $datas)->with('gelar', $gelar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
