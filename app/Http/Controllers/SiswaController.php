<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class SiswaController extends Controller
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
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        return view('data-siswa.siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('data-siswa.buatdatasiswa', [
            'kelas' => $kelas,
            'spp' => $spp
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
            'nisn' => 'required|numeric|unique:siswa|max:1234567890',
            'nis' => 'required|numeric|max:12345678',
            'nama' => 'required|max:35',
            'kelas' => 'required|integer',
            'no_telp' => 'required|numeric|max:123456789123',
            'alamat' => 'required',
            'spp' => 'required|integer'
        ]);
        if($validasi) :
            $store = Siswa::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'id_kelas' => $request->kelas,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'id_spp' => $request->spp,
            ]);
        endif;
        return Redirect::route('siswa');
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
    public function edit($nisn)
    {
        $siswa = Siswa::find($nisn);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('data-siswa.editdatasiswa', [
            'siswa' => $siswa,
            'kelas' => $kelas,
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
    public function update(Request $request, $nisn)
    {
        $validasi = $request->validate([

            'nis' => 'required|numeric|max:12345678',
            'nama' => 'required|max:35',
            'kelas' => 'required|integer',
            'no_telp' => 'required|numeric|max:1234567890123',
            'alamat' => 'required',
            'spp' => 'required|integer'
        ]);
            if($request->nisn != $nisn)
            {
                $validasi['nisn'] = 'required|numeric|unique:siswa|max:10';
            }

        if($validasi) :
            $update = Siswa::findOrFail($nisn)->update([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'id_kelas' => $request->kelas,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'id_spp' => $request->spp,
            ]);
        endif;
        return Redirect::route('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        if(Siswa::find($nisn)->delete()) :
        endif;

        return Redirect::route('siswa');
    }
}
