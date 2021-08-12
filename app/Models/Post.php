<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'body', 'published_at', 'iframe', 'category_id', 'user_id',
    ];

    protected $dates = ['published_at'];

    protected $appends = ['published_date'];

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

    // Un post puede tener un solo administrador
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // metodo para validar post activos o correctos
    public function scopePublished($query)
    {
        $query->with(['category', 'tags', 'photos'])
                ->whereNotNull('published_at')
                ->where('published_at', '<=', Carbon::now())
                ->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        // if(auth()->user()->hasRole('Admin'))
        if(auth()->user()->can('view', $this))
        {
            return $query;
        }
        return $query->where('user_id', auth()->id());
    }

    // public function scopeByYearAndMonth($query)
    // {
    //     return $query->selectRaw('year(published_at) year')
    //                 ->selectRaw('monthname(published_at) monthname')
    //                 ->selectRaw('month(published_at) month')
    //                 ->selectRaw('count(*) posts')
    //                 ->groupBy('year', 'monthname', 'month')
    //                 ->orderBy('year')
    //                 ->get();
    // }

    public function isPublished()
    {
        return ! is_null($this->published_at) && ($this->published_at < today() || $this->published_at = today());
    }

    // metodo para devolver el post recien creado con url unica
    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();
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

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at
                                            ? Carbon::parse($published_at)
                                            : null;
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
    // accesor de fechas de estreno
    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->format('d M Y');
    }
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
