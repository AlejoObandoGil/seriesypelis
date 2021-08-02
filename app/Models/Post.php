<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'body', 'published_at', 'iframe', 'category_id',
    ];

    protected $dates = ['published_at'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($post)
        {
            $post->tags()->detach();
            foreach($post->photos as $photo)
            {
                $photo->delete();
                $photoPath = str_replace('storage', 'public', $photo->url);
                Storage::delete($photoPath);
            }
        });
    }

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

    // metodo para devolver el post recien creado con url unica
    public static function create(array $attributes = [])
    {
        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public function generateUrl()
    {
        $url = str_slug($this->title);

        if ($this->where('url', $url)->exists())
        {
            $url =  "{$url}-{$this->id}";
        };
        $this->url = $url;
        $this->save();
    }

    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = $title;

    //     $url = str_slug($title);

    //     $duplicateUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();

    //     if($duplicateUrlCount)
    //     {
    //         $url .= "-" . uniqid();
    //     }
    //     $this->attributes['url'] = ($url);
    // }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
                                        ? $category
                                        : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag)
                    ? $tag
                    : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }
}
