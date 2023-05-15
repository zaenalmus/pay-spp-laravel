<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class PembayaranController extends Controller
{
    public function __Construct(){
    $this->middleware([
        'auth',
        'privilege:admin&petugas'
    ]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('user')->get();
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        $pembayaran = Pembayaran::orderBy('jumlah_bayar', 'asc')->get();
        return view('entri-pembayaran.pembayaran', [
            'siswa' => $siswa,
            'pembayaran' => $pembayaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('entri-pembayaran.bayar', compact('siswa', 'spp'));
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
            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'id_spp' => 'required|integer',
            'jumlah_bayar' => 'required|numeric',
        ]);

        $user = Auth::user();

        $siswa = Siswa::where('nisn', $request->nisn)->get();
        $siswa = Siswa::where('nama', $request->nama)->get();
        if ($validasi) :
            $store = Pembayaran::create([
                'id' => $user->id,
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'bulan_dibayar' => $request->bulan_dibayar,
                'id_spp' => $request->id_spp,
                'jumlah_bayar' => $request->jumlah_bayar,

            ]);
        endif;
        return Redirect::route('pembayaran');
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
    public function edit($id_pembayaran)
    {
        $pembayaran = Pembayaran::find($id_pembayaran);
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('entri-pembayaran.editpembayaran', [
            'pembayaran' => $pembayaran,
            'siswa' => $siswa,
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
    public function update(Request $request, $id_pembayaran)
    {
        $validasi = $request->validate([

            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'id_spp' => 'required|integer',
            'jumlah_bayar' => 'required|numeric|max:150000',
        ]);

        $siswa = Siswa::where('nisn', $request->nisn)->get();

        if($validasi) :
            $update = Pembayaran::findOrFail($id_pembayaran)->update([
                'nisn' => $request->nisn,
                'bulan_dibayar' => $request->bulan_dibayar,
                'id_spp' => $request->id_spp,
                'jumlah_bayar' => $request->jumlah_bayar,
            ]);
        endif;
        return Redirect::route('pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran)
    {
        if(Pembayaran::find($id_pembayaran)->delete()) :
        endif;

        return Redirect::route('pembayaran');
    }
}
