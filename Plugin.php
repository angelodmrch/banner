<?php namespace Dmrch\Banner;

use Backend;
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
            'name'        => 'Banner',
            'description' => 'Plugin para cadastro de Banners',
            'author'      => 'Fonix',
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
            'dmrch.banner.some_permission' => [
                'tab' => 'Banner',
                'label' => 'Banners'
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
                'label'       => 'Banners',
                'url'         => Backend::url('dmrch/banner/banner'),
                'icon'        => 'icon-file-image-o',
                'permissions' => ['dmrch.banner.*'],
                'order'       => 1,
            ],
        ];
    }

}
