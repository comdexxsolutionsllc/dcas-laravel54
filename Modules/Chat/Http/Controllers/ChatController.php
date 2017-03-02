<?php

namespace Modules\Chat\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\ChatMessage;
use Modules\Chat\Entities\ChatUser;
use Modules\Chat\Events\MessageSent;
use Modules\Chat\Events\UserAdded;
use Modules\Chat\Events\UserDeleted;

class ChatController extends Controller {

    public function __construct()
    {
        //$this->middleware('auth');
    }


    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin !== 1)
        {
            flash('You are not allowed to join the PresenceChannel called "Chat" due to insufficient privileges!');

            return redirect('/home');
        } else
        {
            return view('chat::chat');
        }
    }


    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return ChatMessage::with('user')->get();
    }


    /**
     * Persist message to database
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        if ($user->is_admin !== 1)
        {
            return new Response('Forbidden', 403);
        } else
        {
            $message = $user->messages()->create([
                'message' => $request->input('message')
            ]);

            broadcast(new MessageSent($user, $message))->toOthers();

            return [ 'status' => 'Message Sent!' ];
        }
    }


    /**
     * Fetch all Users
     *
     * @return ChatUser
     */
    public function fetchUsers()
    {
        return ChatUser::all();
    }


    /**
     * Set all users.
     *
     * @param Request $request
     *
     * @return array|Response
     */
    public function setUsers(Request $request)
    {
        $user = Auth::user();

        if ($user->is_admin !== 1)
        {
            return new Response('Forbidden', 403);
        } else
        {
            $user = ChatUser::create([
                'name'      => $user->name,
                'email'     => $user->email,
                'join_time' => Carbon::now()
            ]);

            broadcast(new UserAdded($user))->toOthers();

            return [ 'status' => 'User Added!' ];
        }
    }


    /**
     * Delete a user.
     *
     * @param Request $request
     *
     * @return array|Response
     */
    public function removeUser(Request $request)
    {
        $user = Auth::user();

        if ($user->is_admin !== 1)
        {
            return new Response('Forbidden', 403);
        } else
        {
            $user = ChatUser::where('email', '=', $user->email)->delete();

            broadcast(new UserRemoved($user))->toOthers();

            return [ 'status' => 'User Removed!' ];
        }

    }
}
