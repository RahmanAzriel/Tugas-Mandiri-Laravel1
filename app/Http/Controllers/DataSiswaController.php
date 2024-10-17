<?php

namespace App\Http\Controllers;
use App\Models\Datsis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DataSiswaController extends Controller
{


    public function index(Request $request)
    {
        $data_siswa = Datsis::where ('nama', 'LIKE' , '%' . $request->search_nama . '%')->orderBy('nama' , 'ASC')->SimplePaginate(8);
        return view('datasiswa.index' , compact('data_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('datasiswa.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|max:100',
            'nis' => 'required|max:8',
            'nisn' => 'required|max:10',
            'jk' => 'required|in:L,P' ,
            'umur' => 'required|numeric',
            'jurusan' => 'required',
        ],
        [
            'nama.required' => 'Nama Wajib Diisi',
            'nis.required' => 'NIS Wajib Diisi',
            'nisn.required' => 'NISN Wajib Diisi',
            'jk.required' => 'Jenis Kelamin Wajib Diisi',
            'umur.required' => 'Umur Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
        ]
    );


    Datsis::create([
        'nama' => $request->nama,
        'nis' => $request->nis,
        'nisn' => $request->nisn,
        'jk' => $request->jk,
        'umur' => $request->umur,
        'jurusan' => $request->jurusan,

    ]);
    return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data_siswa = Datsis::where('id', $id)->first();
        return view('datasiswa.edit', compact('data_siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'jk' => 'required',
            'umur' => 'required',
            'jurusan' => 'required',

        ]);

        Datsis::where('id', $id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deletedata = Datsis::where('id' , $id)->delete();
        if($deletedata){

        }
        return redirect()->route('siswa.index')->with('success' , 'data berhasil dihapus');
    }
}


