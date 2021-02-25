<?php

namespace App\Http\Controllers;

use App\Program;
use App\Edulevel;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        // $programs = Program::with('edulevel')->get();
        // $programs = Program::onlyTrashed()->get(); //untuk menampilkan data yang terhapus softly

        // return $programs;
        return view('program/index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulevels = Edulevel::all();
        return view('program.create', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'edulevel_id' => 'required',
        ], [
            'name.required' => 'Nama program tidak boleh kosong',
            'edulevel_id.required' => 'Jenjang tidak boleh kosong',
            'name.min' => 'Minimal 3 karakter'
        ]);

        // return $request;

        // cara pertama
        // $program = new Program;
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;
        // $program->save();

        // cara kedua : mass assignment
        // Program::create([
        //     'edulevel_id' => $request->edulevel_id,
        //     'name' => $request->name,
        //     'student_price' => $request->student_price,
        //     'student_max' => $request->student_max,
        //     'info' => $request->info
        // ]);

        // cara ketiga : quick mass assignment -> syarat: field label dan name inputan harus sama
        Program::create($request->all());

        // cara keempat : gabungan
        // $program = new Program([
        //     'edulevel_id' => $request->edulevel_id,
        //     'name' => $request->name,
        //     'student_price' => $request->student_price,
        //     'student_max' => $request->student_max,
        //     'info' => $request->info
        // ]);
        // $program->student_price = $request->student_price;
        // $program->save();

        return redirect('programs')->with('status', 'Program berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $program->makeHidden(['id', 'edulevel_id'])->toArray();
        // return $program;
        return view('program/show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $edulevels = Edulevel::all();
        return view('program.edit', compact('program', 'edulevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|min:3',
            'edulevel_id' => 'required',
        ], [
            'name.required' => 'Nama program tidak boleh kosong',
            'edulevel_id.required' => 'Jenjang tidak boleh kosong',
            'name.min' => 'Minimal 3 karakter'
        ]);

        // return $request;

        //cara pertama
        // $program = App\Flight::find(1); karena program sudah dideklarasikan jadi find tidak dipakai
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;
        // $program->save();

        //cara kedua : mass assignment
        Program::where('id', $program->id)
        //   ->where('destination', 'San Diego')
          ->update([
            'edulevel_id' => $request->edulevel_id,
            'name' => $request->name,
            'student_price' => $request->student_price,
            'student_max' => $request->student_max,
            'info' => $request->info
            ]);

        return redirect('programs')->with('status', 'Program berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        // cara pertama
        $program->delete();

        // cara kedua
        // Program::destroy($program->id);

        // cara ketiga
        // Program::where('id', $program->id)->delete();
        return redirect('programs')->with('status', 'Data program berhasil dihapus');
    }

    public function trash()
    {
        $programs = Program::onlyTrashed()->get();
        return view('program/trash', compact('programs'));
    }
}
