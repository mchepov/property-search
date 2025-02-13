<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait ScopesTrait
{
    /**
     * Apply scopes to current query
     *
     * @param Builder $query
     * @param array $params
     * @param string|null $prefix
     * @return Builder
     */
    public function applyScopes(Builder $query, array $params, ?string $prefix = ''): Builder
    {
        if (!empty($this->scopes)) {
            foreach ($this->scopes as $scopeField) {
                if (!empty($params[$scopeField])) {
                    $scope = !empty($prefix)
                        ? $prefix . Str::studly($scopeField)
                        : Str::camel($scopeField);
                    $query = $query->$scope($params[$scopeField]);
                }
            }
        }
        return $query;
    }
}
