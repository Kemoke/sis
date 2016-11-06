@extends('uni.base')
@section('title', $course->name)
@section('body')
    <strong>Course Name: </strong>{{$course->name}}<br>
    <strong>Course Code: </strong>{{$course->code}}<br>
    <strong>Course Program: </strong>{{$course->program->name}}<br>
    <strong>Ects: </strong>{{$course->ects}}<br>
    <br>
    <form action="{{url('/courses/'.$course->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{url('/courses/'.$course->id.'/edit')}}" class="btn btn-primary">Edit</a>
        <button class="btn btn-danger">Delete</button>
    </form>
@endsection