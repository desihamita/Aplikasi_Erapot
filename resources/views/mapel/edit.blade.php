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
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama" value="{{ $mapel->nama }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark">Reset</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

