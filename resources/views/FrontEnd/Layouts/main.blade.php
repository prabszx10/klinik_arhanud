@extends('FrontEnd.master')

@section('style')
@include('FrontEnd.Component.css')
@endsection

@section('content')
@include('FrontEnd.Layouts.navbar')

    @include('FrontEnd.Home.index')
    @include('FrontEnd.TentangKami.index')
    @include('FrontEnd.TenagaMedis.index')
    @include('FrontEnd.KegiatanDanBerita.index')

@include('FrontEnd.Layouts.footer')
@endsection

@section('javascript')
@include('FrontEnd.Component.js')
@endsection