<?php

namespace App\Services;

use App\Models\Player;

class PlayerService
{
    public function __construct(private Player $player) {}

    public function getPlayers()
    {
        return $this->player->paginate(request()->per_page);
    }

    public function storePlayer($request)
    {
        return $this->player->create([
            ...$request->validated(),
            'form'       => rand(1, 10),
            'influence'  => f_rand(1, 10, 2),
            'creativity' => f_rand(1, 10, 2),
            'threat'     => f_rand(1, 10, 2),
        ]);
    }

    public function showPlayer($id)
    {
        return $this->player->findOrFail($id);
    }

    public function updatePlayer($request, $id)
    {
        $player = $this->player->findOrFail($id);

        $player->update($request->validated());

        return $player;
    }

    public function deletePlayer($id)
    {
        return $this->player->findOrFail($id)->delete();
    }
}
