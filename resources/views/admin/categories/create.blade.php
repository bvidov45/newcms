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
       <h2 class="text-center">Create a New Category</h2>
     </div>
     <div class="panel-body">
     {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
        <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('name', '', ['class' => 'form-control','placeholder' => 'Enter Category Name'])}}
        </div>
        <div class="text-center">
        {{Form::submit('Store Category', ['class' => 'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
     </div>
</div>
@endsection