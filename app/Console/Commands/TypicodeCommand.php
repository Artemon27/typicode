<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\Typicode;

class TypicodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:typicode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Typicode::dispatch();
        //
    }
}
