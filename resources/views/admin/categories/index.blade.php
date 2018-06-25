@extends('layouts.app')

@section('content')


<table class="table">
  <thead>
    <tr>
      <th>Category Name</th>
    </tr>
  </thead>
  <tbody>
  @if(count($category) > 0)
  @foreach($category as $cat)
     <tr>
      <td>{{$cat->name}}</td>
      <td><a href="{{ route ('category.edit', [ 'id' => $cat->id]) }}" class="btn btn-primary">Edit</a></td>
      <td>
        {!! Form::open(['route' => ['category.delete', $cat->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        <div class="text-center">
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        </div>
        {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
  @endif
 
  </tbody>
</table>


@endsection