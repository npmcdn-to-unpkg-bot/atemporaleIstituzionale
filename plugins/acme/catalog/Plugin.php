<?php namespace Acme\Catalog;

use Backend;
use System\Classes\PluginBase;

/**
 * Crm Plugin Information File
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
            'name'        => 'Catalog',
            'description' => 'Catalog of offering',
            'author'      => 'Acme',
            'icon'        => 'icon-barcode'
        ];
    }

    public function registerNavigation()
    {
        return [
            'crm' => [
                'label'       => 'Catalog',
                'url'         => Backend::url('acme/catalog/offerings'),
                'icon'        => 'icon-tasks',
                'permissions' => ['catalog.*'],
                'order'       => 100,
            ]
        ];
    }

}
