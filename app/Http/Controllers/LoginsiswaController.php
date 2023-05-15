<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pembayaran;

class LoginsiswaController extends Controller
{
    public function showloginsiswa()
    {
        if(!session('nisn') || !session('nama')){
        return view('/auth/loginsiswa');
        }
        return redirect('/siswa');
    }

    public function login(Request $request){
        $request->validate([
            'nisn' => 'required|numeric',
            'nama' => 'required',
        ]);

        $nisn = $request->input('nisn');
        $nama = $request->input('nama');

        $siswa = Siswa::where('nisn', $nisn)
                        ->where('nama', $nama)
                        ->first();

        if ($siswa) {
            $request->session()->put('nisn', $nisn);
            $request->session()->put('nama', $nama);
            return redirect('/siswa');
        }

        return back()->withErrors([
            'nisn' => 'nisn tidak ada'
        ]);
    }

    public function logout(Request $request){
        if(session('nisn') && session('nama')){
            $request->session()->flush();
            return redirect('/loginsiswa');
            }
            return 'gagal logout';
    }

    public function index(){
        $nisn = session('nisn');
        $pembayaran = Pembayaran::where('nisn', $nisn)->paginate(10);

        return view('siswa', compact('pembayaran'));
    }
}
