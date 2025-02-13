<?php

namespace App\Repositories;

use App\Models\House;
use App\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Collection;

class HouseRepository
{
    use ScopesTrait;

    protected array $scopes = [
        'keywords',
        'bedrooms',
        'bathrooms',
        'garages',
        'storeys',
        'price_from',
        'price_to',
    ];

    public function getAll(array $params = []): Collection
    {
        return $this->applyScopes(House::query(), $params)->get();
    }
}
