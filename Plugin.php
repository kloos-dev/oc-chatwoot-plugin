<?php namespace Kloos\Chatwoot;

use Event;
use System\Classes\PluginBase;
use Kloos\Chatwoot\Classes\PageBeforeDisplay;

class Plugin extends PluginBase
{
    // Need this to be also availlable on the settings page
    public $elevated = true;

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Chatwoot',
            'description' => 'Chatwoot plugin for October CMS',
            'author'      => 'Kloos',
            'icon'        => 'icon-message'
        ];
    }

    public function boot()
    {
        Event::subscribe(PageBeforeDisplay::class);
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'kloos.chatwoot.manage_settings' => [
                'tab' => 'Chatwoot',
                'label' => 'Manage settings',
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'chatwoot' => [
                'label'       => 'Settings',
                'description' => 'Manage your Chatwoot settings',
                'category'    => 'Chatwoot',
                'icon'        => 'icon-comments',
                'class'       => '\Kloos\Chatwoot\Models\Settings',
                'order'       => 500,
                'keywords'    => 'chatwoot chat support',
                'permissions' => ['kloos.chatwoot.manage_settings'],
            ],
        ];
    }
}