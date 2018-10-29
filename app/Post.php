<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'body', 'slug', 'category_id', 'album_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album(){
        return $this->belongsTo('App\Album');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function getTagListAttribute(){
        return $this->tags->pluck('id')->toArray();
    }
}
