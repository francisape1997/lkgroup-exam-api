<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

use App\Models\Player;

class PlayerTest extends TestCase
{
    use WithFaker, DatabaseMigrations;

    private const HEADERS = [
        'Accept' => 'Application/json'
    ];

    public function test_fetch_players()
    {
        $this->seed();

        $this->get('api/player', self::HEADERS)->assertStatus(200);
    }

    public function test_store_player()
    {
        $this->seed();

        $player = Player::factory()->count(1)->make();

        $this->post('api/player', $player->toArray()[0], self::HEADERS)->assertStatus(200);
    }

    public function test_update_player()
    {
        $this->seed();

        $player = Player::factory()->count(1)->make();

        $response = $this->post('api/player', $player->toArray()[0], self::HEADERS)->assertStatus(200)->decodeResponseJson();

        $playerId = $response['id'];

        $this->put("api/player/{$playerId}", [
            'first_name'    => 'Francis',
            'second_name'   => null,
            'last_name'     => 'Ape',
            'date_of_birth' => '1997-07-16',
            'height'        => '186',
            'weight'        => '90',
        ], self::HEADERS)
        ->assertStatus(200);
    }

    public function test_edit_player()
    {
        $this->seed();

        $player = Player::factory()->count(1)->make();

        $response = $this->post('api/player', $player->toArray()[0], self::HEADERS)->assertStatus(200)->decodeResponseJson();

        $playerId = $response['id'];

        $this->get("api/player/{$playerId}", self::HEADERS)->assertStatus(200);
    }

    public function test_delete_player()
    {
        $this->seed();

        $player = Player::factory()->count(1)->make();

        $response = $this->post('api/player', $player->toArray()[0], self::HEADERS)->assertStatus(200)->decodeResponseJson();

        $playerId = $response['id'];

        $this->delete("api/player/{$playerId}", self::HEADERS)->assertJson([
            'deleted' => true,
        ])->assertStatus(200);
    }

    public function test_invalid_form_store_player()
    {
        $this->seed();

        $this->post('api/player', [
            'first_name'    => $this->faker->randomNumber(),
            'second_name'   => $this->faker->randomNumber(),
            'last_name'     => $this->faker->randomNumber(),
            'date_of_birth' => '12345',
            'height'        => $this->faker->randomNumber(),
            'weight'        => $this->faker->randomNumber(),
        ], self::HEADERS)
        ->assertStatus(422);
    }

    public function test_invalid_player_id()
    {
        $this->seed();

        $player = Player::factory()->count(1)->make();

        $response = $this->post('api/player', $player->toArray()[0], self::HEADERS)->assertStatus(200)->decodeResponseJson();

        $playerId = ((int) $response['id'] + 1);

        $this->get("api/player/{$playerId}", self::HEADERS)->assertStatus(404);
    }
}
