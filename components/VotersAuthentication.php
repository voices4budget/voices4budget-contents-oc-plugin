<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Components\Authentication;

/**
 * VotersAuthentication Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class VotersAuthentication extends Authentication
{
    public function componentDetails()
    {
        return [
            'name' => 'Voters Authentication Component',
            'description' => 'No description provided yet...'
        ];
    }
}
