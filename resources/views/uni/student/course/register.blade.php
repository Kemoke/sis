@extends('uni.base')
@section('title', 'Register')
@section('body')

    <div id="regapp"></div>
    <script>
        var student = '{!!$student != null ? $student->id : 0!!}';
        var courses = {!!$courses != null ? json_encode($courses) : '[]'!!};
    </script>
    <script src="{{asset('/js/register.js')}}"></script>
@endsection