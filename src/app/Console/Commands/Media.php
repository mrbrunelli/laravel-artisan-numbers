<?php

namespace App\Console\Commands;

use App\Helpers\Numbers;
use Illuminate\Console\Command;

class Media extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:media {numeros*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna a média dos números';

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
            sprintf('Números Média: %0.2f', Numbers::average($this->argument('numeros')))
        );
        return 0;
    }
}
