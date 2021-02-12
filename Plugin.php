<?php namespace Dmrch\Banner;

use Backend;
use Controller;
use System\Classes\PluginBase;

/**
 * Banner Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'dmrch.banner::lang.plugin.name',
            'description' => 'dmrch.banner::lang.plugin.description',
            'author'      => 'Angelo Demarchi',
            'icon'        => 'icon-file-image-o'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Dmrch\Banner\Components\Banner' => 'banners',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'dmrch.banner.permission' => [
                'tab' => 'dmrch.banner::lang.plugin.name',
                'label' => 'dmrch.banner::lang.banner.banners'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'banner' => [
                'label'       => 'dmrch.banner::lang.banner.banners',
                'url'         => Backend::url('dmrch/banner/group'),
                'icon'        => 'icon-file-image-o',
                'permissions' => ['dmrch.banner.*'],
                'order'       => 10,
            ],
        ];
    }
}
