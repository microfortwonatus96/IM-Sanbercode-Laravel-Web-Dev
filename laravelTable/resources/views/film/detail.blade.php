@extends('layout/master')
@section('judul')
    Halaman Detail Film
@endsection
@section('content')
<img src="{{asset('uploads/'.$film->poster)}}" height="200px" width="100%"  class="img-fluid" alt="">
<h3 class="text-primary">{{$film->judul}}</h3>
<p >{{$film->ringkasan}}</p>
<p >{{$film->tahun}}</p>
<p>{{$film->genre_id}}</p>

<hr>
<h3>List Komentar</h3>

@forelse ($film->kritik as $item)    
<div class="card">
    <div class="card-header">
        {{$item->user_kritik->name}}
    </div>
    <div class="card-body">
        <p class="card-text">{{$item->content}}</p>
    </div>
</div>
@empty
    <h3>Tidak ada kometar!!</h3>
@endforelse


<hr>
<form action="/kritik/{{$film->id}}" method="POST">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    @csrf
    <div class="form-group">
        <textarea name="content" placeholder="isi komentar" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label >Point</label>
        <input type="number" name="point" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
</form>
@endsection
