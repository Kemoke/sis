@extends('uni.base')
@section('title', 'Program list')
@section('body')
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($programs as $program)
            <tr>
                <td><a href="{{url('/programs/'.$program->id)}}">{{$program->name}}</a></td>
                <td>{{$program->department->name}}</td>
                <td width="1"><a href="{{url('/programs/'.$program->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
                <td width="1">
                    <form action="{{url('/programs/'.$program->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{url('/programs/create')}}" class="btn btn-success">Add new program</a>
@endsection