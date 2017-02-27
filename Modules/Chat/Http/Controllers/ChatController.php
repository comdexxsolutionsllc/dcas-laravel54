<?php

namespace Modules\Chat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\ChatMessage;
use Modules\Chat\Events\MessageSent;

class ChatController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
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
}
