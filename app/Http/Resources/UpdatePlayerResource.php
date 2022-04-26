<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdatePlayerResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            'id'            => $this->id,
            'first_name'    => $this->first_name,
            'second_name'   => $this->second_name,
            'last_name'     => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'height'        => $this->height,
            'weight'        => $this->weight,
            'form'          => $this->form,
            'influence'     => $this->influence,
            'creativity'    => $this->creativity,
            'threat'        => $this->threat,
            'ict_index'     => $this->ictIndex,
            'metrics'       => config('player.metric'),
        ];
    }
}
