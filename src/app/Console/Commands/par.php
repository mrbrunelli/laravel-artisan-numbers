<?php

namespace App\Console\Commands;

use App\Helpers\Numbers;
use Illuminate\Console\Command;

class par extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:par {numeros*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna os números pares';

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
        $evenNumbers = [];
        for ($i = 0; $i < count($n); $i++) {
            if (Numbers::isEven($n[$i])) {
                array_push($evenNumbers, $n[$i]);
            }
        }
        return implode(', ', $evenNumbers);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(
            sprintf('Números Pares: %s', $this->serializeNumbers($this->argument('numeros')))
        );
        return 0;
    }
}
