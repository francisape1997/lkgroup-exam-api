<?php

namespace App\Interfaces;

interface PlayerDataImporterContract
{
    public function fetchPlayersData() : array; // Returns array translation of players.
}
