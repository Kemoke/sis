@extends('uni.base')
@section('title', 'Department list')
@section('body')
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($depts as $dept)
            <tr>
                <td><a href="{{url('/departments/'.$dept->id)}}">{{$dept->name}}</a></td>
                <td width="1"><a href="{{url('/departments/'.$dept->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
                <td width="1">
                    <form action="{{url('/departments/'.$dept->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{url('/departments/create')}}" class="btn btn-success">Add new department</a>
@endsection