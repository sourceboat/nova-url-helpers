<?php

namespace Sourceboat\Nova\Routing;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Nova;
use Laravel\Nova\Resource;

/**
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 */
class UrlGenerator
{
    /**
     * Generate a "create resource" URL.
     *
     * @param string $resourceClass
     * @param Resource|null $viaResource
     * @param string|null $viaRelationship
     * @param bool $absolute
     * @return string
     */
    public static function create(
        string $resourceClass,
        ?Resource $viaResource = null,
        ?string $viaRelationship = null,
        ?bool $absolute = true
    ): string
    {
        $params = sprintf(
            '?viaResource=%s&viaResourceId=%s&viaRelationship=%s',
            $viaResource ? $viaResource::uriKey() : null,
            $viaResource ? $viaResource->id : null,
            $viaRelationship
        );

        $path = collect([
            Nova::path(),
            'resources',
            $resourceClass::uriKey(),
            'new',
        ])->implode('/') . $params;

        return $absolute ? url($path) : $path;
    }

    /**
     * Generate an "edit resource" URL.
     *
     * @param string $resourceClass
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param bool $absolute
     * @return string
     */
    public static function edit(string $resourceClass, Model $model, bool $absolute = true): string
    {
        $path = collect([
            Nova::path(),
            'resources',
            $resourceClass::uriKey(),
            $model->id,
            'edit',
        ])->implode('/');

        return $absolute ? url($path) : $path;
    }

    /**
     * Generate a "show resource" URL.
     *
     * @param string $resourceClass
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param bool $absolute
     * @return string
     */
    public static function show(string $resourceClass, Model $model, bool $absolute = true): string
    {
        $path = collect([
            Nova::path(),
            'resources',
            $resourceClass::uriKey(),
            $model->id,
        ])->implode('/');

        return $absolute ? url($path) : $path;
    }
}
