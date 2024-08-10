@extends('layout/master')
@section('judul')
    Edit Data
@endsection
@section('content')
<form method="POST" action="/genre/{{$genre->id}}">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @method('PUT')
    @csrf
    <div class="form-group">
      <label >Nama</label>
      <input type="text" value="{{$genre->nama}}" name="nama" class="form-control" >
    </div>
    <div class="form-group">
        <label >Description</label>
        <textarea name="description" class="form-control" cols="30" rows="10">{{$genre->description}}</textarea>
      </div>
    <button type="submit" class="btn btn-success">Edit</button>
  </form>
@endsection



