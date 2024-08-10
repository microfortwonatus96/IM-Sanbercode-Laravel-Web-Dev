@extends('layout/master')
@section('judul')
    Halaman Detail Genre
@endsection
@section('content')
<h3>{{$genre->nama}}</h3>
<p >{{$genre->description}}</p>

<div class="row">
    @forelse ($genre->listFilm as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('uploads/'.$item->poster)}}" width="300px" height="200px" class="card-img-top" alt="...">
            <div class="card-body">
              <h2 >{{$item->judul}}</h2>
              <a href="/film/{{$item->id}}" class="btn-sm btn-primary btn-block">Detail</a>
            </div>
          </div>
    </div> 
    @empty
        <h3>Data Tidak ada!!</h3>
    @endforelse
</div>
@endsection
