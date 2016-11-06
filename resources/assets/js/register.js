import React from 'react';
import ReactDOM from 'react-dom';

var app = document.getElementById('regapp');
class App extends React.Component{
    constructor(){
        //noinspection JSUnresolvedVariable
        this.state = {
            student: student,
            courses: courses,
            sections: [],
            regsections: [],
            timetable: []
        };
        this.updateTimetable = this.updateTimetable.bind(this);
        this.onRegister = this.onRegister.bind(this);
        this.onCourseChange = this.onCourseChange.bind(this);
        var times = [];
        this.state.regsections.map(function (section) {
            section.timetable.map(function (time) {
                times.push({
                    name: section.course.code,
                    time: time
                });
            }.bind(this));
        }.bind(this));
        var timetable = [];
        for(var i = 0; i < 8; i++){
            timetable.push({
                key: 'c'+i,
                time: []
            });
            for(var j = 0; j < 5; j++) {
                timetable[i].time.push({
                    key: 'r'+j,
                    data: ''
                });
                for(var k = 0; k < times.length; k++){
                    var time = times[k];
                    if(time.time.day == j && (time.time.start <= i && time.time.end > i)){
                        timetable[i].time[j].data += ' ' + time.name;
                    }
                }
            }
        }
        this.state.timetable = timetable;
    }
    onDelete(course){
        alert('deleted');
        var regcourses = this.state.regsections;
        const index = regcourses.indexOf(course);
        regcourses.splice(index, 1);
        this.setState({
            regsections: regcourses
        });
        this.updateTimetable();
    }
    updateTimetable(){
        var times = [];
        this.state.regsections.map(function (section) {
            section.timetable.map(function (time) {
                times.push({
                    name: section.course.code,
                    time: time
                });
            }.bind(this));
        }.bind(this));
        var timetable = [];
        for(var i = 0; i < 8; i++){
            timetable.push({
                key: 'c'+i,
                time: []
            });
            for(var j = 0; j < 5; j++) {
                timetable[i].time.push({
                    key: 'r'+j,
                    data: ''
                });
                for(var k = 0; k < times.length; k++){
                    var time = times[k];
                    if(time.time.day == j && (time.time.start <= i && time.time.end > i)){
                        timetable[i].time[j].data += ' ' + time.name;
                    }
                }
            }
        }
        this.setState({
            timetable: timetable
        });
    }
    onRegister(event){
        $("#modal").modal('hide');
    }
    onCourseChange(event){
        var id = event.target.value;
        $.post('/student/sections', {id: id, _token: Laravel.csrfToken}, function (data) {
            $("#section").enable();
            this.setState({
                sections:data
            });
        }.bind(this));
    }
    render(){
        return(
            <div>
                <h1>Registered Courses: </h1>
                <ul className="list-group">
                    {this.state.regsections.map(function (section) {
                        return(
                            <li className="list-group-item" key={section.id}>{section.course.name}({section.course.code}) - Section {section.name} <a href="#" style={{color: 'red'}} className="pull-right" onClick={this.onDelete.bind(this, section)}>Drop</a></li>
                        )
                    }.bind(this))}
                </ul>
                <h1>Timetable: </h1>
                <table className="table table-bordered">
                    <thead>
                    <tr>
                        <th> </th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>
                    </thead>
                    <tbody>
                    {this.state.timetable.map(function (time) {
                        return(
                            <tr key={time.key}>
                                <th>{parseInt(time.key.charAt(1))+8}:00-{parseInt(time.key.charAt(1))+9}:00</th>
                                {time.time.map(function (tm) {
                                    return(
                                        <td key={tm.key}>{tm.data}</td>
                                    )
                                })}
                            </tr>
                        );
                    })}
                    </tbody>
                </table>
                <button type="button" className="btn btn-primary" data-toggle="modal" data-target="#modal">Register new course</button>
                <div id="modal" className="modal fade" role="dialog">
                    <div className="modal-dialog">

                        <div className="modal-content">
                            <div className="modal-header">
                                <button type="button" className="close" data-dismiss="modal">&times;</button>
                                <h4 className="modal-title">Register new course</h4>
                            </div>
                            <div className="modal-body">
                                <label htmlFor="course" className="control-label">Course: </label>
                                <select name="course" id="course" onChange={this.onCourseChange} className="form-control">
                                    {this.state.courses.map(function (course) {
                                        return(
                                            <option key={course.id} value={course.id}>{course.name}</option>
                                        )
                                    })}
                                </select>
                                <label htmlFor="section" className="control-label">Section: </label>
                                <select name="section" id="section" className="form-control" disabled>
                                    {this.state.sections.map(function (section) {
                                        return(
                                            <option key={section.id} value={section.id}>{section.name}</option>
                                        )
                                    })}
                                </select>
                            </div>
                            <div className="modal-footer">
                                <button className="btn btn-primary" type="submit" onClick={this.onRegister}>Register</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(<App/>, app);