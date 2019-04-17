<?php

namespace Vanderb\LaravelShoppette\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shoppette:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Shoppette Install-Command';

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
     * @param  \App\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        $this->info("");
        $this->info("##############################");
        $this->info("Welcome to LARVEL-SHOPPETTE!");
        $this->info("##############################");
        $this->info("");

        // Get package env
        $this->info('Keep it simple or support translations [use flobbos/laravel-translatable-db]?');
        $env = $this->choice('Simpe or translated?', ['simple' => 'Simple', 'translatable' => 'Translatable'], 'simple');

        // Publish migration-files
        $this->info("Publishing migrations files for: '" . $env . "'");
        $this->call('vendor:publish', [
            '--provider' => 'Vanderb\LaravelShoppette\LaravelShoppetteServiceProvider',
            '--tag' => $env
        ]);

        // Publish config-file
        $this->info("Publishing config-file");
        $this->call('vendor:publish', [
            '--provider' => 'Vanderb\LaravelShoppette\LaravelShoppetteServiceProvider',
            '--tag' => 'config'
        ]);
        
        //Generate models
        $this->info('Generating models');
        $this->call('')
        
        // Installation successful
        $this->info("Installation-process complete!");
        $this->info("##############################");
        $this->info("Next Step: Add custom fields to shoppette-migration-files in '/database/migrations' and run 'php artisan migrate'.");
        $this->info("Full Documentation: 'http://github.com/vanderb/laravel-shoppette'");
        $this->info("##############################");
    }

}