@extends('uni.base')
@section('title', $course->name)
@section('body')
    <form class="form-horizontal" action="{{url('/courses/'.$course->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Course Name</label>
            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control" value="{{$course->name}}"></div>
        </div>
        <div class="form-group">
            <label for="code" class="col-md-4 control-label">Course Code</label>
            <div class="col-md-6"><input type="text" id="code" name="code" class="form-control" value="{{$course->code}}"></div>
        </div>
        <div class="form-group">
            <label for="ects" class="col-md-4 control-label">Ects Points</label>
            <div class="col-md-6"><input type="text" id="ects" name="ects" class="form-control" value="{{$course->ects}}"></div>
        </div>
        <div class="form-group">
            <label for="program" class="col-md-4 control-label">Course Program</label>
            <div class="col-md-6">
                <select name="program" id="program" class="form-control">
                    @foreach($programs as $program)
                        <option value="{{$program->id}}"{{$course->program->id == $program->id ? "selected" : ""}}>{{$program->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection