<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;
use App\Http\Requests;

class CourseController extends Controller
{
    private $courses;

    public function __construct(Request $request, Courses $courses)
    {
        $this->courses = $courses;
    }

    public function index()
    {
        $courses = $this->courses->all();
        return view('course.index')->with('courses', $courses);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $this->courses->create($request->all());
        return redirect(route('course.index'));
    }

    public function edit($id)
    {
        $course = $this->courses->find($id);
        return view('course.edit')->with('course', $course);
    }

    public function show($id)
    {
        $course = $this->courses->find($id);
        return view('course.show')->with('course', $course);
    }

    public function update($id, Request $request)
    {
        //dd($request);
        $course = $this->courses->find($id);
        $course->update($request->all());

        return view('course.show')->with('course', $course);
    }
    public function destroy($id)
    {
        //dd($request);
        $course = $this->courses->find($id);
        if (!empty($course)) {
            $course->delete($id);
        }

        return redirect (route('course.index'));
    }

}