<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CopyBashSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dcas:bashcopy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy BASH setup (.bash_profile / .bashrc) to $HOME';

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
    public function handle()
    {
        if (!\File::copy('./utility_files/.bashrc', './utility_files/.bashrc_copy')) {
            die("Couldn't copy file");
        }
    }
}
