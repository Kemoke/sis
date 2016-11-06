@extends('uni.base')
@section('title', '')
@section('body')
    <form class="form-horizontal" action="{{url('/programs/'.$program->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Program name</label>
            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control" value="{{$program->name}}"></div>
        </div>
        <div class="form-group">
            <label for="department" class="col-md-4 control-label">Department</label>
            <div class="col-md-6">
                <select name="department" id="department" class="form-control">
                    @foreach($depts as $dept)
                        <option value="{{$dept->id}}"{{$program->department->id == $dept->id ? 'selected' : ''}}>{{$dept->name}}</option>
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