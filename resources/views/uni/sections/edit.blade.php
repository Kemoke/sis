@extends('uni.base')
@section('title', '')
@section('body')
    <form class="form-horizontal" action="{{url('/sections/'.$section->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Section name</label>
            <div class="col-md-6"><input type="text" id="name" name="name" class="form-control" value="{{$section->name}}"></div>
        </div>
        <div class="form-group">
            <label for="capacity" class="col-md-4 control-label">Capacity</label>
            <div class="col-md-6"><input type="text" id="capacity" name="capacity" class="form-control" value="{{$section->capacity}}"></div>
        </div>
        <div class="form-group">
            <label for="course" class="col-md-4 control-label">Course</label>
            <div class="col-md-6">
                <select name="course" id="course" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}" {{$section->course->id == $course->id ? 'selected' : ''}}>{{$course->name.'('.$course->code.')'}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="time[]" class="col-md-4 control-label">Time Table</label>
            <div class="col-md-6" id="timetable">
                @for($i = 0; $i < $section->timetable->count(); $i++)
                    <?php $time = $section->timetable[$i]?>
                    <div class="row" id="unit">
                        <div class="col-xs-4">
                            <select name="time[{{$i}}][day]" id="time[{{$i}}][day]" class="form-control" title="">
                                <option value="0" {{$time->day == 0 ? 'selected' : ''}}>Monday</option>
                                <option value="1" {{$time->day == 1 ? 'selected' : ''}}>Tuesday</option>
                                <option value="2" {{$time->day == 2 ? 'selected' : ''}}>Wednesday</option>
                                <option value="3" {{$time->day == 3 ? 'selected' : ''}}>Thursday</option>
                                <option value="4" {{$time->day == 4 ? 'selected' : ''}}>Friday</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <select name="time[{{$i}}][start]" id="time[{{$i}}][start]" class="form-control" title="">
                                @for($j = 0; $j < 12; $j++)
                                    <option value="{{$j}}" {{$time->start == $j ? 'selected' : ''}}>{{$j+8}}:00</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <select name="time[{{$i}}][end]" id="time[{{$i}}][end]" class="form-control" title="">
                                @for($j = 0; $j < 12; $j++)
                                    <option value="{{$j}}" {{$time->end == $j ? 'selected' : ''}}>{{$j+8}}:00</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <button type="button" class="btn {{$i != 0 ? 'btn-danger' : 'btn-success'}}"><strong>{{$i != 0 ? '-' : '+'}}</strong></button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        var num = {{$section->timetable->count()}};
        var timetable = $('#timetable');
        var buttons = timetable.find('button');
        $(buttons[0]).click(append);
        for(var i = 1; i < buttons.length; i++){
            $(buttons[i]).click(remove);
        }
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