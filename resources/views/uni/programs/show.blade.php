@extends('uni.base')
@section('title', $program->name)
@section('body')
    <strong>Program Name: </strong>{{$program->name}}<br>
    <strong>Department: </strong>{{$program->department->name}}
    <br><br>
    <form action="{{url('/programs/'.$program->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{url('/programs/'.$program->id.'/edit')}}" class="btn btn-primary">Edit</a>
        <button class="btn btn-danger">Delete</button>
    </form>
@endsection