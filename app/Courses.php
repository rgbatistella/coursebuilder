<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    public $fillable = [
        'name','subtitle','description','price', 'duration', 'published'
    ];

    public function chapters() {
        return $this->hasMany('App\Chapters', 'course_id', 'id');
    }

}
