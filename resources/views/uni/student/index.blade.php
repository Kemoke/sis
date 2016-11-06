@extends('uni.base')
@section('title', 'Student list')
@section('body')
    <table class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Program</th>
            <th>Year</th>
            <th>Semester</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <?php $student = $user->student ?>
            <tr>
                <td><a href="{{url('/students/'.$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$student->name . ' ' . $student->surname}}</td>
                <td>{{$student->program->name}}</td>
                <td>{{$student->year}}</td>
                <td>{{$student->semester}}</td>
                <td width="1"><a href="{{url('/students/'.$user->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
                <td width="1">
                    <form action="{{url('/students/'.$user->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{url('/students/create')}}" class="btn btn-success">Add new student</a>
@endsection