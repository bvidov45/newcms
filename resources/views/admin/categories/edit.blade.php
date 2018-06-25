@extends('layouts.app')


@section('content')






<div class="panel panel-default">
     <div class="panel-heading">
       <h2 class="text-center">Update Category</h2>
     </div>
     <div class="panel-body">
     {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'POST']) !!}
     
        <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('name', $category->name, ['class' => 'form-control','placeholder' => 'Enter Category Name'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        <div class="text-center">
        {{Form::submit('Update Category', ['class' => 'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
     </div>
</div>
@endsection