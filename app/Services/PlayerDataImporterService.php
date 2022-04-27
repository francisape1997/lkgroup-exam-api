<?php

namespace App\Services;

use App\Interfaces\PlayerDataImporterContract;

use App\Models\Player;

class PlayerDataImporterService
{
    public function __construct(private PlayerDataImporterContract $playerDataImporterContract) {}

    public function import()
    {
        $players = $this->playerDataImporterContract->fetchPlayersData();

        if (!$this->isPlayersCountValid($players)) {
            info('Player count does not meet the minimum');

            return;
        }

        foreach($players as $player) {
            Player::create($player);
        }
    }

    /**
     * Checks if the player count meets the minimum.
     * @param array $players 
     * @return bool
     */
    private function isPlayersCountValid(array $players) : bool
    {
        return count($players) >= config('player.importer.minimum');
    }
}
