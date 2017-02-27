<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id)
{
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user)
{
    return ($user->is_admin == 1) ? [ 'id' => $user->id, 'name' => $user->name ] : false;
});

//Broadcast::channel('chat', function ($user)
//{
//    return Auth::check();
//});
