<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $guru = Guru::where ('nama', 'LIKE' , '%' . $request->search_nama . '%')->orderBy('nama' , 'ASC')->SimplePaginate(8);
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required|max:100',
            'nip'=>'required|max:8',
            'jabatan'=>'required',
            'mapel'=>'required',
        ],
        [
            'nama.required' => 'Nama Wajib Diisi',
            'nip.required' => 'NIP Wajib Diisi',
            'jabatan.required' => 'Jabatan Wajib Diisi',
            'mapel.required' => 'Mapel Wajib Diisi',
        ]
    );

    Guru::create([
        'nama' => $request->nama,
        'nip' => $request->nip,
        'jabatan' => $request->jabatan,
        'mapel' => $request->mapel,
    ]);

    return redirect()->route('guru.index')->with('success', 'Data Berhasil Diinput');
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
        $guru = Guru::where('id', $id)->first();
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama'=>'required|max:100',
            'nip'=>'required|max:8',
            'jabatan'=>'required',
            'mapel'=>'required',
        ]);

        Guru::where('id', $id)->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'mapel' => $request->mapel,
        ]);
        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deletedata = Guru::where('id' , $id)->delete();
        if($deletedata){
            return redirect()->route('guru.index')->with('success', 'Data Berhasil Dihapus');
        }
    }
}
