@extends('layouts.app')

@section('title', 'Tahun Ajaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('tahunAjaran.index') }}">Tahun Ajaran</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 ">
        <form action="{{ route('tahunAjaran.update', $tahunAjaran->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <x-card >
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror"  name="tahun_ajaran" value="{{ old('tahun_ajaran') ?? $tahunAjaran->tahun_ajaran }}" required>
                    @error('tahun_ajaran')
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

