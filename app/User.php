<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Session;
use Carbon\Carbon;
use Cmgmyr\Messenger\Traits\Messagable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable {

    use Billable, EntrustUserTrait, HasApiTokens, Messagable, Notifiable;

    /**
     * The attributes that should be autocast to a Carbon instance.
     *
     * @var array
     */
    protected $dates = [ 'last_logged_in_at', 'trial_ends_at', 'ends_at', 'created_at', 'updated_at' ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_logged_in_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Utility function to return last row of database.
     *
     * @return mixed
     */
    protected function last()
    {
        return $this::orderBy('created_at', 'desc')->first();
    }


    /**
     * Get the user's updated at date.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        if ( ! is_null($value))
        {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
        }
    }


    /**
     * Get the user's last logged-in date.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getLastLoggedInAtAttribute($value)
    {
        if ( ! is_null($value))
        {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
        }
    }


    /**
     * @return bool
     */
    public function isAdministrator()
    {
        return (\Auth::user()->id == 2); // TODO: Change this to your admin ID
    }


    /**
     * Set Impersonating a User
     *
     * @param $id
     */
    public function setImpersonating($id)
    {
        Session::put('impersonate', $id);
    }


    /**
     * Stop Impersonating a User
     */
    public function stopImpersonating()
    {
        Session::forget('impersonate');
    }


    /**
     * Check if Impersonating
     *
     * @return mixed
     */
    public function isImpersonating()
    {
        return Session::has('impersonate');
    }


    /**
     * @return mixed
     */
    public function username()
    {
        return \Auth::user()->username;
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('\Modules\Chat\Entities\ChatMessage');
    }
}
