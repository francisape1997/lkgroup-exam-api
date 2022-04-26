<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'last_name',
        'date_of_birth',
        'height',
        'weight',
        'form',
        'influence',
        'creativity',
        'threat',
    ];

    public function getFullNameAttribute()
    {
        $firstName = $this->attributes['first_name'];
        $secondName = $this->attributes['second_name'];
        $lastName = $this->attributes['last_name'];

        $hasSecondName = $secondName !== null;

        $withSecondName = "$firstName $secondName $lastName";

        $withoutSecondName = "$firstName $lastName";

        return $hasSecondName ? $withSecondName : $withoutSecondName;
    }

    public function getIctIndexAttribute()
    {
        $influence = $this->attributes['influence'];
        $creativity = $this->attributes['creativity'];
        $threat = $this->attributes['threat'];

        return ceil(($threat / 10) + ($creativity / 10) + ($influence / 10));
    }

    public function toArray()
    {
        return
        [
            'id'        => $this->id,
            'full_name' => $this->full_name,
        ];
    }
}
