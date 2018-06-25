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
       <h2 class="text-center">Create a New Post</h2>
     </div>
     <div class="panel-body">
     {!! Form::open(['route' => 'post.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('title', '', ['class' => 'form-control','placeholder' => 'Enter Title'])}}
        </div>
        <div class="form-group">
          {{Form::label('featured', 'Featured Image')}}
          {{Form::file('featured', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
          {{Form::label('category_id', 'Select a Category')}}
          {{Form::select('category_id', $select, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
          {{Form::label('content', 'Content')}}
          {{Form::textarea('content','' , ['class' => 'form-control'])}}
        </div>
        <div class="text-center">
        {{Form::submit('Store Post', ['class' => 'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
     </div>
</div>
@endsection