<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class PostUpdate extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'post-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs artisan commands which must run only in not production mode after `composer update` command.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!App::environment('production')) {
            Artisan::call('ide-helper:generate');
            Artisan::call('ide-helper:meta');
        }
    }
}
