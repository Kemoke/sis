@extends('uni.base')
@section('title', $dept->name)
@section('body')
    <form class="form-horizontal" action="{{url('/departments/'.$dept->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Department Name</label>

            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control" value="{{$dept->name}}"></div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection