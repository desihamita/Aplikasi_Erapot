@extends('layouts.app')

@section('title', 'Mata Pelajaran')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Mata Pelajaran</li>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('mapel.create') }}" class="btn navbar-purple"><i class="fas fa-plus-circle"></i>Tambah Data</a>
            </div>
            <div class="card-body">
                <form action="" class="d-flex justify-content-between">
                    <x-dropdowntable/>
                    <x-filter-table />
                </form>
                <table class="table table-striped">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th width="15%"><i class="fas fa-cog"></i></th>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
                <div class="float-right mt-3">
                    {{ $mapel->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <x-toast/>
@endpush



