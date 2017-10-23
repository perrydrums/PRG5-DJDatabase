<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'lastname', 'alias', 'genre', 'website', 'spotify', 'soundcloud', 'picture'
    ];

    /**
     * Artist has many-to-many relationship with Party
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function parties()
    {
        return $this->belongsToMany('App\Party');
    }

    /**
     * Has one-to-many relationship with Genre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genres()
    {
        return $this->belongsTo('App\Genre');
    }
}
