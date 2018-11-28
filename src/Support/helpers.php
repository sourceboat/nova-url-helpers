<?php

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Resource;
use Sourceboat\Nova\Routing\UrlGenerator;

/**
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 */
if (!function_exists('nova_url_edit')) {

    function nova_url_edit(string $resource, Model $model, bool $absolute = true): string
    {
        return UrlGenerator::edit($resource, $model, $absolute);
    }

}

/**
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 */
if (!function_exists('nova_url_show')) {

    function nova_url_show(string $resource, Model $model, bool $absolute = true): string
    {
        return UrlGenerator::show($resource, $model, $absolute);
    }

}

/**
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 */
if (!function_exists('nova_url_create')) {

    function nova_url_create(
        string $resourceClass,
        ?Resource $viaResource = null,
        ?string $viaRelationship = null,
        bool $absolute = true
    ): string
    {
        return UrlGenerator::create($resourceClass, $viaResource, $viaRelationship, $absolute);
    }
}
