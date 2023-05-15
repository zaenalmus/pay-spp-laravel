<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class SppController extends Controller
{
    public function __Construct(){
        $this->middleware([
            'auth',
            'privilege:admin'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::orderBy('tahun', 'asc')->get();
        return view('data-spp/spp', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spp = Spp::all();
        return view('data-spp/buatdataspp', [
            'id_spp' => $spp,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tahun' => 'required|min:4|max:4',
            'nominal' => 'required|numeric',
        ]);
        if ($validasi) :
            $store = Spp::create([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);
        endif;
        return Redirect::route('spp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_spp)
    {
        $spp = Spp::find($id_spp);
        return view('data-spp.editdataspp', [
            'spp' => $spp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_spp)
    {
        $validasi = $request->validate([

            'tahun' => 'required|min:4|max:4',
            'nominal' => 'required|numeric',
        ]);

        if($validasi) :
            $update = Spp::findOrFail($id_spp)->update([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);
        endif;
        return Redirect::route('spp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_spp)
    {
        if(Spp::find($id_spp)->delete()) :
        endif;

        return Redirect::route('spp');
    }
}
