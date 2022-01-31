@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Lokasi</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Lokasi</div>

            <div class="card-body">
                <p><a href="{{ route('lokasi.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Koordinat</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokasis as $data)
                            <tr>
                                <td>
                                    <img src="{{ asset('img/' . $data->gambar) }}" alt="none" style="max-width: 30px;" onclick="return openModal('{{ asset('img/' . $data->gambar) }}');">
                                </td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->koordinat }}</td>
                                <td>{!! $data->alamat !!}</td>
                                <td>{!! $data->keterangan !!}</td>
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'lokasi'])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
@include('partial.modalImage')
@include('partial.dataTable')
@endsection
