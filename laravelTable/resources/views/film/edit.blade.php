@extends('layout/master')
@section('judul')
    Edit Data
@endsection
@section('content')
<form method="POST" action="/film/{{$film->id}}" enctype="multipart/form-data">
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
    @method('PUT')
    <div class="form-group">
      <label >Judul</label>
      <input type="text" value="{{$film->judul}}" name="judul" class="form-control" >
    </div>
    
    <div class="form-group">
      <label >Ringkasan</label>
      <textarea name="ringkasan" class="form-control" cols="30" rows="10">{{$film->ringkasan}}</textarea>
    </div>

    <div class="form-group">
        <label >Tahun</label>
        <input type="number" value="{{$film->tahun}}" name="tahun" class="form-control" >
    </div>

    <div class="form-group">
        <label >Poster</label>
        <input type="file" name="poster" class="form-control-file" >
    </div>

    <div class="form-group">
    <label >Genre</label>
    <select name="genre_id" class="form-control">
        <option value="">--Pilih Genre--</option>
        @forelse ($genre as $item)
            @if ($item->id == $film->genre_id)
                <option value="{{$item->id}}" selected>{{$item->nama}}</option>
            @else
                <option value="{{$item->id}}">{{$item->nama}}</option>         
            @endif
            
        @empty 
            <option> Tidak ada Genre, silahkan ditambahkan!!</option>
        @endforelse
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
@endsection

