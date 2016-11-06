@extends('uni.base')
@section('title', '')
@section('body')
    <strong>Section Name: </strong>{{$section->name}}<br>
    <strong>Course: </strong>{{$section->course->name}}<br>
    <strong>Capacity: </strong>{{$section->capacity}}<br>
    <strong>Timetable: </strong>
    <ul class="list-group">
        @foreach($section->timetable as $time)
            <li class="list-group-item"><?php
                switch ($time->day){
                    case 0:
                        echo 'Monday';
                        break;
                    case 1:
                        echo 'Tuesday';
                        break;
                    case 2:
                        echo 'Wednesday';
                        break;
                    case 3:
                        echo 'Thursday';
                        break;
                    case 4:
                        echo 'Friday';
                        break;
                }
                ?>: {{$time->start+8}}:00 - {{$time->end+8}}:00</li>
        @endforeach
    </ul>
    <br><br>
    <form action="{{url('/sections/'.$section->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{url('/sections/'.$section->id.'/edit')}}" class="btn btn-primary">Edit</a>
        <button class="btn btn-danger">Delete</button>
    </form>
@endsection