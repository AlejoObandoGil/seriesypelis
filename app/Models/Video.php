<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'post_id', 'season_id', 'chapter', 'url_chapter', 'iframe_chapter'
    ];
}
