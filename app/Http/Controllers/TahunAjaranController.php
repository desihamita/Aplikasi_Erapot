<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    protected $paginate = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahunAjaran = TahunAjaran::orderBy('tahun_ajaran')
        ->when($request->has('q') && $request->q != "", function ($query) use ($request) {
            $query->where('tahun_ajaran', 'LIKE', '%'. $request->q . '%');
        })
        ->paginate($request->rows ?? $this->paginate)
        ->appends($request->only('rows', 'q'));

        return view('tahunAjaran.index', compact('tahunAjaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahunAjaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|unique:tahun_ajaran,tahun_ajaran'
        ]);

        $data = $request->only('tahun_ajaran');

        TahunAjaran::create($data);

        return redirect()->route('tahunAjaran.index')
            ->with([
                'message' => 'Tahun ajaran berhasil ditambahkan',
                'success' => true,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        return view('tahunAjaran.edit', compact('tahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|unique:tahun_ajaran,tahun_ajaran,'.$tahunAjaran->id
        ]);
        $data = $request->only('tahun_ajaran');

        $tahunAjaran->Update($data);
        return redirect()->route('tahunAjaran.index')
        ->with([
            'message' => 'Tahun Ajaran Berhasil Diperbaharui',
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        //
    }
}