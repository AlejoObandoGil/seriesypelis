<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'post_id', 'season', 'url_season'
    ];

    // Un post puede tener muchos capitulos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
