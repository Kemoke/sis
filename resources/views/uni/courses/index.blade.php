@extends('uni.base')
@section('title', 'Course list')
@section('body')
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Program</th>
            <th>Ects</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td><a href="{{url('/courses/'.$course->id)}}">{{$course->name}}</a></td>
                <td>{{$course->code}}</td>
                <td>{{$course->program->name}}</td>
                <td>{{$course->ects}}</td>
                <td width="1"><a href="{{url('/courses/'.$course->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
                <td width="1">
                    <form action="{{url('/courses/'.$course->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{url('/courses/create')}}" class="btn btn-success">Add new course</a>
@endsection