<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model {

    protected $fillable = [ 'message' ];

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('\App\User')->select([ 'id', 'name', 'email', 'is_admin' ]);;
    }
}
