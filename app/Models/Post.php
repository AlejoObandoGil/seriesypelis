<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $dates = ['published_at'];

    public function getRouteKeyName(){

        return 'url';
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);

    }
    // Un post puede tener muchas fotos
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    // metodo para validar post activos o correctos
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at');
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }
}
