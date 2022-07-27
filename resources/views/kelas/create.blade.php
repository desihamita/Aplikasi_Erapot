@extends('layouts.app')

@section('title', 'Mata Pelajaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('mapel.index') }}">Mata Pelajaran</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 ">
        <form action="{{ route('mapel.store') }}" method="post">
            @csrf
            @method('post')
            <x-card>
                <div class="form-group row">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama')}}" required>

                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
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

