@extends('layouts.app')

@section('content')


<table class="table">
  <thead>
    <tr>
      <th>Image</th>
      <th>Title</th>
      <th>Edit</th>
      <th>Trash</th>
    </tr>
  </thead>
  <tbody>
   @foreach($posts as $post)
     <tr>
        <td><img style="height:100px;" src="{{$post->featured}}"></td>
        <td>{{$post->title}}</td>
        <td>
          <a href="{{ route ('post.edit', ['id' => $post->id])}}" class="btn btn-success">Edit</a>
        </td>
        <td>
          <a href="{{ route ('post.delete', ['id' => $post->id])}}" class="btn btn-danger">Trash</a>
        </td>
     </tr>
   @endforeach
 </tbody>
</table>


@endsection