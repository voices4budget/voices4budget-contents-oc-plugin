<?php namespace Voices4budget\Contents;

use Event;
use System\Classes\PluginBase;
use Voices4budget\Contents\Classes\ExtendUserPlugin;
use Voices4Budget\Contents\Components\ActiveVotingSession;
use Voices4Budget\Contents\Components\AreasList;
use Voices4Budget\Contents\Components\AreaTypesList;
use Voices4Budget\Contents\Components\CategoriesList;
use Voices4Budget\Contents\Components\CategoryDetail;
use Voices4Budget\Contents\Components\CountriesList;
use Voices4Budget\Contents\Components\IdeaForm;
use Voices4Budget\Contents\Components\ProgramsList;
use Voices4Budget\Contents\Components\VotersAuthentication;
use Voices4Budget\Contents\Components\VotingSessionsList;
use Voices4budget\Contents\Models\Setting;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    public $require = [
        'Rainlab.User',
        'Rainlab.Translate'
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
            VotersAuthentication::class => 'votersAuth',
            CategoriesList::class => 'categoriesList',
            CategoryDetail::class => 'categoryDetail',
            CountriesList::class => 'countriesList',
            ProgramsList::class => 'programsList',
            AreaTypesList::class => 'areaTypesList',
            IdeaForm::class => 'ideaForm',
            ActiveVotingSession::class => 'activeVotingSession',
            VotingSessionsList::class => 'votingSessionsList',
            AreasList::class => 'areasList'
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'Voices4Budget Content Settings',
                'description' => 'Manage settings of Voices4Budget',
                'category' => 'VOICES4BUDGET',
                'icon' => 'icon-bullhorn',
                'class' => Setting::class,
            ]
        ];
    }
}
