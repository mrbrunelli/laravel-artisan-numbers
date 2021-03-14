<?php

namespace App\Console\Commands;

use App\Helpers\Numbers;
use Illuminate\Console\Command;

class menor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:menor {numeros*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna o menor número';

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
     * @return int
     */
    public function handle()
    {
        $this->info(
            sprintf('Números Menor: %d', Numbers::min($this->argument('numeros')))
        );
        return 0;
    }
}
