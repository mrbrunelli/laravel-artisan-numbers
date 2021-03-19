<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Rotina extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rotina:integrar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integração';

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
        $requestCotacao = Http::get(env('API_COTACAO'));
        if ($requestCotacao->status() == 200) {
            Log::channel('cotacao')->info($requestCotacao->body());
            foreach (json_decode($requestCotacao->body(), true) as $cotacao) {
                $this->info(sprintf('%s: %s', $cotacao['name'], $cotacao['ask']));
            }
        } else {
            $this->error('Erro ao realizar a integração.');
        }
        return 0;
    }
}
