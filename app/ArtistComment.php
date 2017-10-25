<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistComment extends Model
{
    /**
     * Has many-to-one relationship with Artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo('\App\Artist');
    }
}
