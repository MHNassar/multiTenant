<?php

namespace MHNassar\MultiTenant\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateMultiTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Multi:migrate {connection}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create migration to anther tenant ';

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
        $connection = $this->argument('connection');

        \Illuminate\Support\Facades\Config::set('database.default', $connection);
        $this->info('#############  Database Convert Done ############');
        Artisan::call('migrate', ['--seed' => true]);
        $this->info('#############  Database Migrations Done ############');
        \Illuminate\Support\Facades\Config::set('database.default', env('DB_CONNECTION'));

    }
}
