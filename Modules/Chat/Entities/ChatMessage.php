<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model {

    public $fillable = [ 'message' ];

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('\App\User')->select(array('id', 'name', 'email', 'is_admin'));;
    }
}
