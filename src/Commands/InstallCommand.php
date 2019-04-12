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
        $this->info("Welcome to Laravel-Shoppette Installer!");

        $package = $this->choice('Install full package?', ['full' => 'Full (with translations)', 'simple' => 'Simple'], 'full');

        if($package == 'full') {

        } else {

        }
    }
}