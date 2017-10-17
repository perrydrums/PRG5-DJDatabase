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
        'name', 'firstname', 'lastname', 'alias', 'website', 'spotify', 'soundcloud', 'picture'
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
}
