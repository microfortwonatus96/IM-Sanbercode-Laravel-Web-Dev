@extends('layout/master')
@section('judul')
    Tambah Data
@endsection
@section('content')
<form method="POST" action="/film" enctype="multipart/form-data">
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
      <label >Judul</label>
      <input type="text" name="judul" class="form-control" >
    </div>
    
    <div class="form-group">
      <label >Ringkasan</label>
      <textarea name="ringkasan" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label >Tahun</label>
        <input type="number" name="tahun" class="form-control" >
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
                <option value="{{$item->id}}">{{$item->nama}}</option>
            @empty
                <option value="">Tidak ada Genre, silahkan ditambahkan!!</option>
            @endforelse
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
@endsection

