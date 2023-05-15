<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class PetugasController extends Controller
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
        $user = User::orderBy('id', 'asc')->get();
        return view('data-petugas.petugas', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('data-petugas.buatdatapetugas', [
            'id' => $user,
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
            'level' => 'required',
            'nama_petugas' => 'required|max:35',
            'username' => 'required|max:25',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);
        if ($validasi) :
            $store = User::create([
                'nama_petugas' => $request->nama_petugas,
                'username' => $request->username,
                'email' => $request->email,
                'level' => $request->level,
                'password' => Hash::make($request->password)
            ]);
        endif;
        return Redirect::route('petugas');
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('data-petugas.editdatapetugas', [
            'user' => $user
        ]);
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
        $validasi = $request->validate([

            'nama_petugas' => 'required|max:35',
            'username' => 'required|max:25',
            'level' => 'required',
        ]);

        if ($request->email != $id) {
            $validasi['email'] = 'required|unique:users';
        }

        if($validasi) :
            $update = User::findOrFail($id)->update([
                'nama_petugas' => $request->nama_petugas,
                'username' => $request->username,
                'email' => $request->email,
                'level' => $request->level,
                'password' => Hash::make($request->password),
            ]);
        endif;
        return Redirect::route('petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete()) :
        endif;

        return Redirect::route('petugas');
    }
}
