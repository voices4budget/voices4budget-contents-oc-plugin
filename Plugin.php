<?php namespace Voices4budget\Contents;

use Event;
use System\Classes\PluginBase;
use Voices4budget\Contents\Classes\ExtendUserPlugin;
use Voices4Budget\Contents\Components\VotersAuthentication;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    public $require = [
        'Rainlab.User'
    ];

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        Event::subscribe(ExtendUserPlugin::class);
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            VotersAuthentication::class => 'votersAuth'
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
