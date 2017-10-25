<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartyComment extends Model
{
    /**
     * Has many-to-one relationship with Party
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('\App\Party');
    }
}
