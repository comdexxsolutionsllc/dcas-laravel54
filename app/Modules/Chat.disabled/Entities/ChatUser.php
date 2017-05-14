<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatUser extends Model {

    use SoftDeletes;

    protected $fillable = [ 'name', 'email', 'join_time' ];

    protected $dates = [ 'join_time' ];
}
