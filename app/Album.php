<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = ['name', 'description', 'cover_id', 'cover_path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function image()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * @return mixed
     */
    public function getTagListAttribute(){
        return $this->tags->pluck('id')->toArray();
    }

    public function getAlbumCoverPath()
    {
        $cover = $this->getCover();
        $thumbnailPath = $cover->thumbnail_path . '/' . $cover->thumbnail;
        $imagePath = $cover->file_path . '/' . $cover->file_name;

        return ['thumbnailPath' => $thumbnailPath, 'imagePath' => $imagePath];
    }

    public function getCover()
    {
        return $this->image()->where('id', $this->cover_id)->first();
    }
}
