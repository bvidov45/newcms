@extends('layouts.app')

@section('content')


<table class="table">
  <thead>
    <tr>
      <th>Image</th>
      <th>Title</th>
      <th>Restore</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
   @foreach($posts as $post)
     <tr>
        <td><img style="height:100px;" src="{{$post->featured}}"></td>
        <td>{{$post->title}}</td>
        
        <td>
          <a href="{{ route ('post.restore', ['id' => $post->id])}}" class="btn btn-success btn-sm">Restore</a>
        </td>
        <td>
          <a href="{{ route ('post.kill', ['id' => $post->id])}}" class="btn btn-danger btn-sm">Delete</a>
        </td>
     </tr>
   @endforeach
 </tbody>
</table>


@endsection