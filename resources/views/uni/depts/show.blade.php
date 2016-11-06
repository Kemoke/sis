@extends('uni.base')
@section('title', $dept->name)
@section('body')
    <strong>Department Name: </strong>{{$dept->name}}<br><br>
    <form action="{{url('/departments/'.$dept->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{url('/departments/'.$dept->id.'/edit')}}" class="btn btn-primary">Edit</a>
        <button class="btn btn-danger">Delete</button>
    </form>
@endsection