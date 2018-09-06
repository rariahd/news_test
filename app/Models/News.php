<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id', 'published_at'
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['published_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * Get user record associated with the job.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get topics record associated with the job.
     */
    public function topics()
    {
        return $this->belongsToMany('App\Models\Topic', 'news_topic', 'news_id', 'topic_id');
    }

    public function scopeNotPublished($query){
        return $query->whereNull('published_at');
    }

    public function scopePublished($query){
        return $query->whereNotNull('published_at');
    }
}
