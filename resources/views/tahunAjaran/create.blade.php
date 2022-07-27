@extends('layouts.app')

@section('title', 'Tahun Ajaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('mapel.index') }}">Tahun Ajaran</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 ">
        <form action="{{ route('tahunAjaran.store') }}" method="post">
            @csrf
            @method('post')
            <x-card>
                <div class="form-group row">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control  @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" value="{{ old('tahun_ajaran')}}" required>

                    @error('tahun_ajaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    </div>
                    <div class="form-group row">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="form-control  @error('semester') is-invalid @enderror" value="{{ old('semester')}}">
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>

                      @error('semester')
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

