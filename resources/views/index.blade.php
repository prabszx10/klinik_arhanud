@extends('master')
@foreach ($metadatas as $metadata)
    @section('judul_halaman')
        {{ $metadata->Judul }}
    @endsection
    @section('deskripsi_halaman')
        Selamat Datang Di Sistem Informasi Klinik Arhanud Kota Batu
    @endsection
@endforeach
@section('konten')
          
@endsection