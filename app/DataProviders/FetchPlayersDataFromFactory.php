<?php

namespace App\DataProviders;

use App\Interfaces\PlayerDataImporterContract;

use App\Models\Player;

class FetchPlayersDataFromFactory implements PlayerDataImporterContract
{
    public function fetchPlayersData(): array
    {
        $users = Player::factory()->count(100)->make();

        return $users->toArray();
    }
}