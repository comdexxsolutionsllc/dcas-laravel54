<?php

namespace App;

use Carbon\Carbon;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Session;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable {

    use Billable, EntrustUserTrait, HasApiTokens, Messagable, Notifiable;

    /**
     * The attributes that should be autocast to a Carbon instance.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'ends_at',
        'last_logged_in_at',
        'trial_ends_at',
        'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'last_logged_in_at',
        'name',
        'password'
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
     * Get the user's created at date.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return $value ?? Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans() ?? '';
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
        return $value ?? Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans() ?? 'null';
    }


    /**
     * Get the user's trial end date.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getTrialEndsAtAttribute($value)
    {
        return $value ?? Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans() ?? '';
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
        return $value ?? Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans() ?? '';
    }


    /**
     * Is the user an administrator user.
     *
     * @return bool user is administrator
     */
    public function isAdministrator()
    {
        return (\Auth::user()->id == 2); // TODO: Change this to your admin ID
    }


    /**
     * Check if impersonating a user.
     *
     * @return mixed
     */
    public function isImpersonating()
    {
        return Session::has('impersonate');
    }


    /**
     * Impersonating a user.
     *
     * @param $id User ID
     */
    public function setImpersonating($id)
    {
        Session::put('impersonate', $id);
    }


    /**
     * Stop Impersonating a user.
     */
    public function stopImpersonating()
    {
        Session::forget('impersonate');
    }


    /**
     * A user can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('\Modules\Internal\Entities\Comment');
    }


    /**
     * A user can have many messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('\Modules\Chat\Entities\ChatMessage');
    }


    /**
     * A user can have many tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('\Modules\Internal\Entities\Ticket');
    }


    /**
     * Username from user object.
     *
     * @return string username
     */
    public function username()
    {
        return \Auth::user()->username;
    }
}
