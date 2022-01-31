@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('lokasi.index') }}">Lokasi</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
            <div class="card-header">Lokasi</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('lokasi.store') }}" enctype="multipart/form-data">
                    @csrf

                    <x-input type="file" :defaultValue="old('gambar')" :isRequired="true"
                        globalAttribute="gambar" label="Gambar" customAttribute="accept=image/*">
                        @include('partial.image-preview', ['imageName' => old('gambar'), 'inputId'=>'gambar', 'modalId' => 'modalGambar'])
                        <small>* Max file size 1 Mb</small>
                    </x-input>

                    <x-input globalAttribute="nama" :defaultValue="old('nama')" customAttribute="required" />
                    
                    <x-input globalAttribute="koordinat" :defaultValue="old('koordinat')" customAttribute="required" />
                    
                    <x-text-area :isTinyMce="true" globalAttribute="alamat" :defaultValue="old('alamat')" />

                    <x-text-area :isTinyMce="true" globalAttribute="keterangan" :defaultValue="old('keterangan')" />
                    
                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
