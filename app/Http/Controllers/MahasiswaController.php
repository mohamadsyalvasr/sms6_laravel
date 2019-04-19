<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        // return view('lihatmahasiswa');
        $mahasiswa = \App\Mahasiswa::all();
        return view ('mahasiswa.view',compact('mahasiswa'));
    }

    public function form(){
        return view('mahasiswa.create');
    }

    public function simpan(Request $request){
        $this->validate($request, [
            'nim'=>'required',
            'namamahasiswa' => 'required',
        ]);
        $data = $request->all();
        $store = \App\Mahasiswa::insert($data);
        return redirect()->back()->with('success');
    }
}
