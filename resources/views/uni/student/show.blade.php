@extends('uni.base')
@section('title', 'Student')
@section('body')
    <strong>Username: </strong>{{$user->name}}<br>
    <strong>E-Mail: </strong>{{$user->email}}<br>
    <strong>Program: </strong>{{$user->student->program->name}}<br>
    <strong>Name: </strong>{{$user->student->name . ' ' . $user->student->surname}}<br>
    <strong>Year: </strong>{{$user->student->year}}<br>
    <strong>Semester: </strong>{{$user->student->semester}}<br>
    <br><br>
    <form action="{{url('/students/'.$user->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{url('/students/'.$user->id.'/edit')}}" class="btn btn-primary">Edit</a>
        <button class="btn btn-danger">Delete</button>
    </form>
@endsection