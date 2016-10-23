<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    public $fillable = [
        'course_id','order','title'
    ];

    public function course() {
        return $this->belongsTo('App\Courses', 'course_id');
    }

    public function contents() {
        return $this->hasMany('App\Content', 'chapter_id');
    }

}
