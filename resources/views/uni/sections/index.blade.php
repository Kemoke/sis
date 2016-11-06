@extends('uni.base')
@section('title', 'Section list')
@section('body')
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Capacity</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sections as $section)
            <tr>
                <td><a href="{{url('/sections/'.$section->id)}}">{{$section->name}}</a></td>
                <td>{{$section->course->name}}</td>
                <td>{{$section->capacity}}</td>
                <td width="1"><a href="{{url('/sections/'.$section->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
                <td width="1">
                    <form action="{{url('/sections/'.$section->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{url('/sections/create')}}" class="btn btn-success">Add new section</a>
@endsection