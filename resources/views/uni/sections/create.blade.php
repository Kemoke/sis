@extends('uni.base')
@section('title', '')
@section('body')
    <form class="form-horizontal" action="{{url('/sections')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Section name</label>
            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="capacity" class="col-md-4 control-label">Capacity</label>
            <div class="col-md-6"><input type="text" id="capacity" name="capacity" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="course" class="col-md-4 control-label">Course</label>
            <div class="col-md-6">
                <select name="course" id="course" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name.'('.$course->code.')'}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="time[]" class="col-md-4 control-label">Time Table</label>
            <div class="col-md-6" id="timetable">
                <div class="row" id="unit">
                    <div class="col-xs-4">
                        <select name="time[0][day]" id="time[0][day]" class="form-control" title="">
                            <option value="0">Monday</option>
                            <option value="1">Tuesday</option>
                            <option value="2">Wednesday</option>
                            <option value="3">Thursday</option>
                            <option value="4">Friday</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select name="time[0][start]" id="time[0][start]" class="form-control" title="">
                            @for($i = 0; $i < 12; $i++)
                                <option value="{{$i}}">{{$i+8}}:00</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select name="time[0][end]" id="time[0][end]" class="form-control" title="">
                            @for($i = 0; $i < 12; $i++)
                                <option value="{{$i}}">{{$i+8}}:00</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-success"><strong>+</strong></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        var num = 0;
        var timetable = $('#timetable');
        timetable.find('button').click(append);
        function append(){
            var unit = $('#unit').clone(true);
            var selects = unit.find('select');
            num++;
            for(var i = 0; i < selects.length; i++){
                var select = $(selects[i]);
                var name = select.attr('name');
                var newName = name.replace(/(\d)/, num);
                select.attr({
                    id: newName,
                    name: newName
                });
            }
            var delbtn = $('<button>').addClass('btn btn-danger').html('-').click(remove);
            unit.find('button').remove();
            unit.find('.col-xs-2').append(delbtn);
            timetable.append(unit);
        }
        function remove() {
            $(this).parent().parent().remove();
            num--;
        }
    </script>
@endsection