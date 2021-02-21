<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data()
    {
        $edulevels = DB::table('edulevels')->get();

        // return $edulevels;
        // dd($edulevels);

        //ada tiga cara lempar data
        // return view('edulevel.data', ['edulevels' => $edulevels]); //bisa titik bisa slash
        return view('edulevel.data', compact('edulevels')); //jika data yang dilempar namanya sama
        return view('edulevel.data')->with('edulevels', $edulevels); //
    }

    public function add()
    {
        return view('edulevel.add');
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'name.min' => 'Minimal 2 karakter'
        ]);

        DB::table('edulevels')->insert([
            'name' => $request->name,
            'desc' => $request->desc
            ]
        );
        return redirect('edulevels')->with('status', 'Jenjang berhasil ditambahkan!');

    }

    public function edit($id)
    {
        $edulevel = DB::table('edulevels')->where('id', $id)->first();
        // dd($edulevel);
        return view('edulevel/edit', compact('edulevel'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'name.min' => 'Minimal 2 karakter'
        ]);

        DB::table('edulevels')->where('id', $id)->update([
            'name' => $request->name,
            'desc' => $request->desc
        ]);
        return redirect('edulevels')->with('status', 'Jenjang berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels')->with('status', 'Jenjang berhasil dihapus!');
    }
}
