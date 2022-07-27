@extends('layouts.app')

@section('title', 'Mata Pelajaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('mapel.index') }}">Mata Pelajaran</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 ">
        <form action="{{ route('mapel.update', $mapel->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <x-card >
                <div class="form-group">
                    <label for="nama">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"  name="nama" value="{{ old('nama') ?? $mapel->nama }}" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <x-slot name="footer">
                    <button type="reset" class="btn btn-dark">Reset</button>
                    <button class="btn btn-primary">Simpan</button>
                </x-slot>
            </x-card>
        </form>
    </div>
</div>
@endsection

