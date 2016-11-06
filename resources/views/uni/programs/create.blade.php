@extends('uni.base')
@section('title', 'Create new program')
@section('body')
    <form class="form-horizontal" action="{{url('/programs')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Program name</label>
            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="department" class="col-md-4 control-label">Department</label>
            <div class="col-md-6">
                <select name="department" id="department" class="form-control">
                    @foreach($depts as $dept)
                        <option value="{{$dept->id}}">{{$dept->name}}</option>
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