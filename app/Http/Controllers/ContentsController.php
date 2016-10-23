<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Content;
use App\Chapters;

class ContentsController extends Controller
{
    private $chapters;
    private $contents;

    public function __construct(Request $request, Chapters $chapters, Content $contents)
    {
        $this->chapters = $chapters;
        $this->contents = $contents;
    }

    public function create($chapter_id)
    {
        $chapter = $this->chapters->find($chapter_id);
        if (!empty($chapter)) {
            $content = new Content;
            return view('contents.create')->with('chapter', $chapter)->with('content',$content);
        }
    }
    public function store($chapter_id, Request $request)
    {
        $chapter = $this->chapters->find($chapter_id);
        $content = new Content;
        $content->fill($request->all());
        $content->chapter_id = $chapter_id;
        $content->order = 1000000;
        $chapter->contents()->save($content);
        $this->contentsreorder($chapter_id);
        return view('chapter.show')->with('chapter',$chapter)->with('selected_content', $content);
    }
    public function destroy($id)
    {
        $content = $this->contents->find($id);
        $chapter = $this->chapters->find($content->chapter_id);
        if (!empty($content)) {
            $content->delete($id);
        }
        //$newcontent = new Content;
        return redirect (route('chapter',$chapter->id));

        //return view('chapter.show')->with('chapter',$chapter)->with('selected_content',$newcontent);
    }

    public function edit($id)
    {
        $content = $this->contents->find($id);
        $chapter = $this->chapters->find($content->chapter_id);
        return view('contents.edit')->with('content', $content)->with('chapter', $chapter);
    }

    public function select($id)
    {
        $content = $this->contents->find($id);
        $chapter = $this->chapters->find($content->chapter_id);
        return view('chapter.show')->with('chapter',$chapter)->with('selected_content',$content);
    }

    public function select_next($id)    {
        $content = $this->contents->find($id);
        $chapter = $this->chapters->find($content->chapter_id);

        $content = $this->contents->where('chapter_id',$content->chapter_id)->where('order','>',$content->order)->orderBy('order')->first();
        if (empty($content->id)) {
            $chapter = $this->chapters->where('course_id',$chapter->course_id)->where('order','>',$chapter->order)->orderBy('order')->first();
            $selected_content = $this->contents->where('chapter_id',$chapter->id)->orderBy('order')->first();
            return view('chapter.show')->with('chapter',$chapter)->with('selected_content',$selected_content);
        } else {
            $chapter = $this->chapters->find($content->chapter_id);
            return $this->select($content->id);
        }


    }

    public function update($id, Request $request)
    {
        $content = $this->contents->find($id);
        $chapter = $this->chapters->find($content->chapter_id);
        $content->update($request->all());
        $newcontent = new Content;
        return view('chapter.show')->with('chapter', $chapter)->with('selected_content',$newcontent);
    }

    public function contentsreorder($chapter_id) {
        $contents = $this->contents->where('chapter_id',$chapter_id)->orderBy('order','asc')->get();

        $i = 0;

        foreach ($contents as $content) {
            $content->order = $i++;
            $content->save();
        }
    }
    
    public function reorder($id, $from, $to)
    {
        $contents1 = $this->contents->find($id);
        $this->contentsreorder($contents1->chapter_id);

        $content = $this->contents->find($id);
        $chapter = $this->chapters->find($content->chapter_id);
        $content->order = $to;
        $content->save();
        if ($from < $to) {
            for ($i = $from + 1; $i <= $to; $i++) {
                $content = $this->contents->where('id','<>',$id)->where('chapter_id',$content->chapter->id)->where('order',$i)->first();
                if (!empty($content->id)) {
                    if ($content->order <> 0) {
                        $content->order = $content->order - 1;
                        $content->save();
                    }
                }
            }
        }
        else {
            for ($i = $from - 1; $i >= $to; $i--) {
                $content = $this->contents->where('id','<>',$id)->where('chapter_id',$content->chapter->id)->where('order',$i)->first();
                if (!empty($content->id)) {
                    $content->order = $content->order + 1;
                    $content->save();
                }
            }
        }
        return (redirect(route('chapter', $chapter->id)));
        //view('course.show')->with('course', $course);
    }
}
