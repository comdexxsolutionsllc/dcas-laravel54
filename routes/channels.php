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

///*
// * Authenticate the user's personal channel...
// */
//Broadcast::channel('App.User.*', function ($user, $userId)
//{
//    return (int) $user->id === (int) $userId;
//});

Broadcast::channel('chat-room.*', function ($user, $chatroomId)
{
    if (true)
    { // Replace with real authorization
        return [
            'id'   => $user->id,
            'name' => $user->name
        ];
    }
});

Broadcast::channel('chat-room-presence.*', function ($user, $roomId)
{
    if (true)
    { // Replace with real authorization
        return [
            'id'   => $user->id,
            'name' => $user->name
        ];
    }
});