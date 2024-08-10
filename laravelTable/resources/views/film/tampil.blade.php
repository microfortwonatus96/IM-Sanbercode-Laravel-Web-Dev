@extends('layout/master')
@section('judul')
    Halaman Tampil Film
@endsection
@section('content')
@auth
    <a href="/film/create" class="btn btn-sm btn-primary mb-3">Tambah Film</a>
@endauth

<div class="row">
    @forelse ($film as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('uploads/'.$item->poster)}}" width="300px" height="200px" class="card-img-top" alt="...">
            <div class="card-body">
              <h2 >{{$item->judul}}</h2>
              <span class="badge badge-success">{{$item->genre->nama}}</span>
              <a href="/film/{{$item->id}}" class="btn-sm btn-primary btn-block">Detail</a>
              @auth
              <div class="row my-2">
                <div class="col">
                    <a href="/film/{{$item->id}}/edit" class="btn-sm btn-primary btn-block">Edit</a>
                </div>
                <div class="col">
                    <form action="/film/{{$item->id}}" method="POST">
                        @csrf
                        @method('Delete')
                        <input type="submit" class="btn-sm btn-danger btn-block" value="Delete">
                    </form>       
                </div>
              </div>
              @endauth
            </div>
          </div>
    </div> 
    @empty
        <h2>Tidak ada Film</h2>
    @endforelse
</div>
@endsection

