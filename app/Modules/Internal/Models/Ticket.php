<?php

namespace Modules\Internal\Entities;

use App\BaseModel;
//use Illuminate\Database\Eloquent\Model;

class Ticket extends BaseModel {

    protected $fillable = [
        'user_id',
        'category_id',
        'ticket_id',
        'title',
        'priority',
        'message',
        'status'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
