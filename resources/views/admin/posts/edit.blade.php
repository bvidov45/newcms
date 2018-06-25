@extends('layouts.app')


@section('content')
@if(count($errors) > 0)
@foreach($errors->all() as $error)
  <div class="alert alert-danger">
      {{$error}}
  </div>
@endforeach
@endif

<div class="panel panel-default">
     <div class="panel-heading">
       <h2 class="text-center">Update Post</h2>
     </div>
     <div class="panel-body">
      <form action="{{route ('post.update',['id', $post->id])}}" method="post" enctype="multipart/form-data"> 
         {{csrf_field()}}
         <div class="form-group">
           <label for="title">Title</label>
           <input  type="text" name="title" value="{{$post->title}}" class="form-control">
         </div>
         <div class="form-group">
           <label for="featured">Featured</label>
           <input  type="file" name="featured">
         </div>
         <div class="form-group">
           <label for="category_id">Select Category</label>
           <select name="category_id" class="form-control">
           @foreach($categories as $category)
           <option value="{{$category->id}}">{{$category->name}}</option>
           @endforeach
         </select>
         </div>
         <div class="form-group">
           <label for="content">Content</label>
           <textarea name="content" class="form-control">{{$post->content}}"</textarea>
         </div>
         
         <div>
           <input type="submit" name="submit" class="btn btn-info" value="Update Post">
         </div>

      </form>
     </div>
</div>
@endsection