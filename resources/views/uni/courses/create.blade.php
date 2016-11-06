@extends('uni.base')
@section('title', 'Create new course')
@section('body')
    <form class="form-horizontal" action="{{url('/courses')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Course Name</label>
            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="code" class="col-md-4 control-label">Course Code</label>
            <div class="col-md-6"><input type="text" id="code" name="code" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="ects" class="col-md-4 control-label">Ects Points</label>
            <div class="col-md-6"><input type="text" id="ects" name="ects" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="program" class="col-md-4 control-label">Course Program</label>
            <div class="col-md-6">
                <select name="program" id="program" class="form-control">
                    @foreach($programs as $program)
                        <option value="{{$program->id}}">{{$program->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection