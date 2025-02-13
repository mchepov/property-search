<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'date:Y-m-d',
            'updated_at' => 'date:Y-m-d',
        ];
    }

    public function scopeKeywords(Builder $builder, string $keywords): Builder
    {
        return $builder->where('title', 'LIKE', '%'.$keywords.'%');
    }

    public function scopeBedrooms(Builder $builder, int $bedrooms): Builder
    {
        return $builder->where('bedrooms', $bedrooms);
    }

    public function scopeBathrooms(Builder $builder, int $bathrooms): Builder
    {
        return $builder->where('bathrooms', $bathrooms);
    }

    public function scopeGarages(Builder $builder, int $garages): Builder
    {
        return $builder->where('garages', $garages);
    }

    public function scopeStoreys(Builder $builder, int $storeys): Builder
    {
        return $builder->where('storeys', $storeys);
    }

    public function scopePriceFrom(Builder $builder, int $priceFrom): Builder
    {
        return $builder->where('price_from', '>=', $priceFrom);
    }

    public function scopePriceTo(Builder $builder, int $priceTo): Builder
    {
        return $builder->where('price_to', '<=', $priceTo);
    }
}
