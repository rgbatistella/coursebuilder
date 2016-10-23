<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Chapters;
use App\Courses;
use App\Content;

class ChaptersController extends Controller
{
    private $chapters;
    private $course;

    public function __construct(Request $request, Chapters $chapters, Courses $course)
    {
        $this->chapters = $chapters;
        $this->course = $course;
    }

    public function create($course_id)
    {
        $course = $this->course->find($course_id);
        if (!empty($course)) {
            $chapter = new Chapters;
            return view('chapter.create')->with('course', $course)->with('chapter',$chapter);
        }
    }

    public function store($course_id, Request $request)
    {
        $course = $this->course->find($course_id);
        $chapter = new Chapters;
        $chapter->fill($request->all());
        $chapter->course_id = $course_id;
        $chapter->order = 1000000;
        $course->chapters()->save($chapter);
        $this->chaptersreorder($course_id);
        return view('course.show')->with('course',$course);
    }
    public function destroy($id)
    {
        $chapter = $this->chapters->find($id);
        $course = $this->course->find($chapter->course_id);
        if (!empty($chapter)) {
            $chapter->delete($id);
        }
        return redirect (route('course',$course->id));
        //view('course.show')->with('course',$course);
    }

    public function edit($id)
    {
        $chapter = $this->chapters->find($id);
        $course = $this->course->find($chapter->course_id);
        return view('chapter.edit')->with('chapter', $chapter)->with('course', $course);
    }

    public function update($id, Request $request)
    {
        $chapter = $this->chapters->find($id);
        $course = $this->course->find($chapter->course_id);
        $chapter->update($request->all());
        return view('course.show')->with('course', $course);
    }

    public function contentsreorder($chapter_id) {
        $contents = \App\Content::where('chapter_id',$chapter_id)->orderBy('order','asc')->get();

        $i = 0;

        foreach ($contents as $content) {
            $content->order = $i++;
            $content->save();
        }
    }

    public function show($id)
    {
        $this->contentsreorder($id);
        $chapter = $this->chapters->find($id);
        $course = $this->course->find($chapter->course_id);
        $newcontent = new Content;
        return view('chapter.show')->with('chapter', $chapter)->with('selected_content',$newcontent);
    }

    public function chaptersreorder($course_id) {
        $chapters = $this->chapters->where('course_id',$course_id)->orderBy('order','asc')->get();

        $i = 0;

        foreach ($chapters as $chapter) {
            $chapter->order = $i++;
            $chapter->save();
        }
    }

    public function reorder($id, $from, $to)
    {
        $chapter1 = $this->chapters->find($id);
        $this->chaptersreorder($chapter1->course_id);
        $chapter = $this->chapters->find($id);
        $course = $this->course->find($chapter->course_id);
        $chapter->order = $to;
        $chapter->save();
        if ($from < $to) {
            for ($i = $from + 1; $i <= $to; $i++) {
                $chapter = $this->chapters->where('id','<>',$id)->where('course_id',$chapter->course_id)->where('order',$i)->first();
                if (!empty($chapter->id)) {
                  $chapter->order = $chapter->order - 1;
                  $chapter->save();
                }
            }
        }
        else {
            for ($i = $from - 1; $i >= $to; $i--) {
                $chapter = $this->chapters->where('id','<>',$id)->where('course_id',$chapter->course_id)->where('order',$i)->first();
                if (!empty($chapter->id)) {
                    $chapter->order = $chapter->order + 1;
                    $chapter->save();
                }
            }
        }
        return (redirect(route('course', $course->id)));
            //view('course.show')->with('course', $course);
    }

}

