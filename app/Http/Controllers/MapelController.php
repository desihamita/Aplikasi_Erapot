<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    protected $paginate = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mapel = Mapel::orderBy('nama')
        ->when($request->has('q') && $request->q != "", function ($query) use ($request) {
            $query->where('nama', 'LIKE', '%'. $request->q . '%');
        })
        ->paginate($request->rows ?? $this->paginate)
        ->appends($request->only('rows', 'q'));

        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the create for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
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
            'nama' => 'required|unique:mapel,nama'
        ]);

        $data = $request->only('nama');

        Mapel::create($data);

        return redirect()->route('mapel.index')
            ->with([
                'message' => 'Kategori berhasil ditambahkan',
                'success' => true,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the create for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $this->validate($request, [
            'nama' => 'required|unique:mapel,nama,'.$mapel->id
        ]);
        $data = $request->only('nama');

        $mapel->Update($data);
        return redirect()->route('mapel.index')
        ->with([
            'message' => 'Mata Pelajaran Berhasil Diperbaharui',
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapel.index')
        ->with([
            'message' => 'Mata Pelajaran Berhasil Dihapus',
            'success' => true,
        ]);
    }
}