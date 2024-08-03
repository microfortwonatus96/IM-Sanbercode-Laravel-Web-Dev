@extends('layout/master')
@section('judul')
    Halaman Tampil Cast
@endsection
@section('content')
<p>{{$cast->nama}}</p>
<p>{{$cast->umur}}</p>
<p>{{$cast->bio}}</p>
@endsection