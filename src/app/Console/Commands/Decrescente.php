<?php

namespace App\Console\Commands;

use App\Helpers\Numbers;
use Illuminate\Console\Command;

class Decrescente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:decrescente {numeros*} {--impares} {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna os números em ordem decrescente';

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
     * Verifica se o parametro --impares foi declarado
     * 
     * @return boolean
     */
    public function imparesParameterHasDeclared(int $p)
    {
        if ($p == 1) {
            return true;
        }
        return false;
    }

    /**
     * Retorna números formatados e separados por vírgula
     * 
     * @return string
     */
    public function serializeNumbers(array $n)
    {
        arsort($n);
        $limitedNumbers = array_slice($n, 0, $this->option('limit'));
        if ($this->imparesParameterHasDeclared($this->option('impares'))) {
            $oddNumbers = [];
            for ($i = 0; $i < count($limitedNumbers); $i++) {
                if (Numbers::isOdd($limitedNumbers[$i])) {
                    array_push($oddNumbers, $limitedNumbers[$i]);
                }
            }
            return implode(', ', $oddNumbers);
        }
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
            sprintf('Números Decrescentes: %s', $this->serializeNumbers($this->argument('numeros')))
        );
        return 0;
    }
}
