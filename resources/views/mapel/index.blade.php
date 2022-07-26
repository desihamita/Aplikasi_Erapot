@extends('layouts.app')

@section('title', 'Mata Pelajaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Mata Pelajaran</li>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12 ">
        <x-card >
            <x-slot name="header">
                <a href="{{ route('mapel.create') }}" class="btn btn-secondary"><i class="fas fa-plus-circle"></i>Tambah Data</a>
            </x-slot>
            <form action="" class="d-flex justify-content-between">
                <x-dropdowntable/>
                <x-filter-table />
            </form>
            <x-table>
                <x-slot name="thead">
                    <th width="5%">No</th>
                    <th>Nama Mata Pelajaran</th>
                    <th width="15%"><i class="fas fa-cog"></i></th>
                </x-slot>
                @foreach ($mapel as $key => $item)
                    <tr>
                        <td><x-number-table :key="$key" :model="$mapel" /></td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <form action="{{ route('mapel.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <a href="{{ route('mapel.edit', $item->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-table>
            <x-pagination :model="$mapel" />
        </x-card>
    </div>
</div>
@endsection
<x-toast/>




