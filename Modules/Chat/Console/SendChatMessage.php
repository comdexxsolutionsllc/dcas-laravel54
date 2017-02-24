<?php

namespace Modules\Chat\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SendChatMessage extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'chat:message';

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'chat:message {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send chat message.';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        // Fire off an event, just randomly grabbing the first user for now
        $user = \App\User::first();
        $message = \Modules\Chat\Entities\ChatMessage::create([
            'user_id' => $user->id,
            'message' => $this->argument('message')
        ]);

        broadcast(new \Modules\Chat\Events\ChatMessageWasReceived($message, $user))->toOthers();
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            [ 'message', InputArgument::REQUIRED, 'Message text to chatroom.' ]
        ];
    }


    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
