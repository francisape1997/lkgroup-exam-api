<?php

namespace App\DataProviders;

use App\Interfaces\PlayerDataImporterContract;

class FetchPlayerDataFromS3 implements PlayerDataImporterContract
{
    public function fetchPlayersData() : array
    {
        # Just an example.
        // $players = S3::fetch();
        // return $players;

        return [];
    }
}
