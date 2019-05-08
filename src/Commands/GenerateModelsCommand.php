<?php

namespace Vanderb\LaravelShoppette\Commands;

use Illuminate\Console\Command;

class GenerateModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shoppette:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Shoppette Generate Models';
    
    protected $type = 'Views';
    private $current_stub;
    
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(){
        return [
            'index.blade.php'=>__DIR__.'/../../resources/stubs/index.stub',
            'create.blade.php'=>__DIR__.'/../../resources/stubs/create.stub',
            'edit.blade.php'=>__DIR__.'/../../resources/stubs/edit.stub'
            ];
    }
    
    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name){
        return resource_path('views/laravel-shoppette/'.$this->getDirectoryName($name));
    }
    
    protected function getDirectoryName($name){
        //dd($name);
        return  str_plural(strtolower(kebab_case($name)));
    }
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
        
    }

}