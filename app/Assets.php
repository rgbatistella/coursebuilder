<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    public $fillable = [
        'ClientOriginalName',
        'ClientOriginalExtension',
        'Size',
        'MimeType',
        'name'
    ];

    public function course() {
        return $this->belongsTo('App\Content', 'asset_id');
    }

}
