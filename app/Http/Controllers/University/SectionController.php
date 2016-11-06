<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseTime;
use App\Section;
use Illuminate\Http\Request;

use App\Http\Requests;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();

        return view('uni.sections.index', ['sections' => $sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('uni.sections.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = new Section();
        $section->name = $request->name;
        $section->capacity = $request->capacity;
        $section->room = $request->room;
        $section->course()->associate(Course::find($request->course));
        $section->save();
        foreach ($request->time as $time){
            $coursetime = new CourseTime();
            $coursetime->day = $time['day'];
            $coursetime->start = $time['start'];
            $coursetime->end = $time['end'];
            $section->timetable()->save($coursetime);
        }

        return redirect()->to('/sections/'.$section->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);

        return view('uni.sections.show', ['section' => $section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
        $courses = Course::all();
        return view('uni.sections.edit', ['section' => $section, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        $section->name = $request->name;
        $section->capacity = $request->capacity;
        $section->room = $request->room;
        $section->course()->associate(Course::find($request->course));
        $section->save();
        $section->timetable()->delete();
        foreach ($request->time as $time){
            $coursetime = new CourseTime();
            $coursetime->day = $time['day'];
            $coursetime->start = $time['start'];
            $coursetime->end = $time['end'];
            $section->timetable()->save($coursetime);
        }

        return redirect()->to('/sections/'.$section->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::destroy($id);

        return redirect()->to('/sections');
    }
}
