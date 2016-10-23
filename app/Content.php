<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $fillable = [
        'chapter_id',
        'order',
        'title',
        'content_type',
        'asset_id',
        'content_html'
    ];

    public function chapter() {
        return $this->belongsTo('App\Chapters', 'chapter_id');
    }

    public function asset() {
        return $this->hasOne('App\Assets','id','asset_id');
    }
    
}
