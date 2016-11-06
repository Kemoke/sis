<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\Mail\AccountCreated;
use App\Program;
use App\Section;
use App\Student;
use App\User;
use Barryvdh\Reflection\DocBlock\Tag\AuthorTag;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentList()
    {
        $users = User::where(['usertype' => 2])->get();

        return view('uni.student.index', ['users' => $users]);
    }

    public function editStudent($id)
    {
        $user = User::find($id);
        $programs = Program::all();

        return view('uni.student.edit', ['user' => $user, 'student' => $user->student, 'programs' => $programs]);
    }

    public function showStudent($id)
    {
        $user = User::find($id);

        return view('uni.student.show', ['user' => $user, 'student' => $user->student]);
    }

    public function createStudent(Request $request)
    {
        $programs = Program::all();

        return view('uni.student.create', ['programs' => $programs]);
    }

    public function saveStudent(Request $request)
    {
        $student = new Student();
        $program = Program::find($request->program);
        $student->program()->associate($program);
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->student_id = $request->student_id;
        $student->semester = $request->semester;
        $student->year = $request->year;
        $student->active = false;
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $pw = uniqid();
        $user->password = bcrypt($pw);
        $user->usertype = 2;
        $user->save();
        $user->student()->save($student);
        $userinfo = new \stdClass();
        $userinfo->username = $user->name;
        $userinfo->password = $pw;
        \Mail::to($user->email)->send(new AccountCreated($userinfo));
        return redirect('/students/'.$user->id);
    }

    public function modifyStudent(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->username;
        $user->email = $request->email;
        $student = $user->student;
        $program = Program::find($request->progid);
        $student->program()->associate($program);
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->student_id = $request->student_id;
        $student->semester = $request->semester;
        $student->year = $request->year;
        $student->save();

        return redirect('/students/'.$id);
    }

    public function destroyStudent($id)
    {
        User::destroy($id);

        return redirect('/students');
    }

    public function courseList()
    {
        $student = \Auth::user()->student;

        return view('uni.student.course.list', ['student' => $student]);
    }

    public function registrationIndex()
    {
        $student = \Auth::user()->student;
        $courses = $student != null ? $student->program->courses : [];
        return view('uni.student.course.register', ['student' => $student, 'courses' => $courses]);
    }

    public function getCourseList($progid)
    {
        $courses = Program::find($progid)->courses;

        return response()->json($courses);
    }

    public function getSectionList($courseid)
    {
        $sections = Course::find($courseid)->sections;

        return response()->json($sections);
    }

    public function register($sectionid)
    {
        $user = \Auth::user();
        $section = Section::with('course')->find($sectionid);
        if($section->capacity <= $section->students()->count()){
            return "section is full";
        }
        $section->students()->attach($user->student);
        return response()->json($section);
    }
}
