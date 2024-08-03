@extends('layout/master')
@section('judul')
    Halaman Tampil Cast
@endsection
@section('content')
<a href="/cast/create" class="btn btn-sm btn-primary mb-3">Tambah Cast</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($cast as $key => $items)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$items->nama}}</td>
            <td>               
                <form action="/cast/{{$items->id}}" method="POST">
                    <a href="/cast/{{$items->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/cast/{{$items->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                    @csrf
                    @method('delete')

                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </td>
          </tr>
        @empty
            <p>No users</p>
        @endforelse
      
    </tbody>
  </table>
@endsection