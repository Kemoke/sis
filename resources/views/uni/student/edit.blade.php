@extends('uni.base')
@section('title', 'Edit student')
@section('body')
    <form class="form-horizontal" action="{{url('/students/'.$user->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="username" class="col-md-4 control-label">Username</label>
            <div class="col-md-6"><input type="text" id="username" name="username" class="form-control" value="{{$user->name}}"></div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-4 control-label">E-Mail</label>
            <div class="col-md-6"><input type="email" id="email" name="email" class="form-control" value="{{$user->email}}"></div>
        </div>
        <div class="form-group">
            <label for="student_id" class="col-md-4 control-label">Student ID</label>
            <div class="col-md-6"><input type="text" id="student_id" name="student_id" class="form-control" value="{{$student->student_id}}"></div>
        </div>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Student Name</label>
            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control" value="{{$student->name}}"></div>
        </div>
        <div class="form-group">
            <label for="surname" class="col-md-4 control-label">Student Surname</label>
            <div class="col-md-6"><input type="text" id="surname" name="surname" class="form-control" value="{{$student->surname}}"></div>
        </div>
        <div class="form-group">
            <label for="program" class="col-md-4 control-label">Program</label>
            <div class="col-md-6">
                <select name="program" id="program" class="form-control">
                    @foreach($programs as $program)
                        <option value="{{$program->id}}" {{$student->program->id == $program->id ? 'selected' : ''}}>{{$program->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="year" class="col-md-4 control-label">Year</label>
            <div class="col-md-6"><input type="text" id="year" name="year" class="form-control" value="{{$student->year}}"></div>
        </div>
        <div class="form-group">
            <label for="semester" class="col-md-4 control-label">Semester</label>
            <div class="col-md-6"><input type="text" id="semester" name="semester" class="form-control" value="{{$student->semester}}"></div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection