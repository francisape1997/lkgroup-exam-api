<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Services\PlayerDataImporterService;

class FetchPlayersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and import players';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(PlayerDataImporterService $playerDataImporterService)
    {
        $playerDataImporterService->import();

        return 0;
    }
}
