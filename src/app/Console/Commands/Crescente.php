<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Crescente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:crescente {numeros*} {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna os números em ordem crescente';

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
     * Retorna números formatados e separados por vírgula
     * 
     * @return string
     */
    public function serializeNumbers($n)
    {
        asort($n);
        $limitedNumbers = array_slice($n, 0, $this->option('limit'));
        return implode(', ', $limitedNumbers);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(
            sprintf('Números Crescentes: %s', $this->serializeNumbers($this->argument('numeros')))
        );
        return 0;
    }
}
