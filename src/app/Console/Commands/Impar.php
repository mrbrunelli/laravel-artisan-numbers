<?php

namespace App\Console\Commands;

use App\Helpers\Numbers;
use Illuminate\Console\Command;

class Impar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:impar {numeros*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna os números ímpares';

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
    public function serializeNumbers(array $n) {
        $oddNumbers = [];
        for ($i = 0; $i < count($n); $i++) {
            if (Numbers::isOdd($n[$i])) {
                array_push($oddNumbers, $n[$i]);
            }
        }
        return implode(', ', $oddNumbers);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(
            sprintf('Números Ímpares: %s', $this->serializeNumbers($this->argument('numeros')))
        );
        return 0;
    }
}
