<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Redirect;


class KelasController extends Controller
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
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('data-kelas.kelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('data-kelas.buatdatakelas', [
            'kelas' => $kelas,
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
            'nama_kelas' => 'required|max:10',
            'kompetensi_keahlian' => 'required',
        ]);
        if($validasi) :
            $store = Kelas::create([
                'nama_kelas' => $request->nama_kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian,
            ]);
        endif;
        return Redirect::route('kelas');
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
    public function edit($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        return view('data-kelas.editdatakelas', [
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelas)
    {
        $validasi = $request->validate([

            'nama_kelas' => 'required|max:10',
            'kompetensi_keahlian' => 'required',
        ]);

        if($validasi) :
            $update = Kelas::findOrFail($id_kelas)->update([
                'nama_kelas' => $request->nama_kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian,
            ]);
        endif;
        return Redirect::route('kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelas)
    {
        if(Kelas::find($id_kelas)->delete()) :
        endif;

        return Redirect::route('kelas');
    }
}
