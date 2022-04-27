<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

# Interface
use App\Interfaces\PlayerDataImporterContract;

# DataProvider
use App\DataProviders\FetchPlayerDataFromS3;
use App\DataProviders\FetchPlayersDataFromFactory;

class PlayerDataImporterProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PlayerDataImporterContract::class, function() {

            /**
             * For this test I've used config based but we can also implement database here.
             * If the user wants to change the data source dynamically.
             */
            return match(config('player.importer.data_source'))
            {
                's3' => new FetchPlayerDataFromS3,
                'factory' => new FetchPlayersDataFromFactory,
                // Another data source here ...
            };

        });
    }

    public function boot()
    {
        //
    }
}
