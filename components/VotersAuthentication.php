<?php namespace Voices4Budget\Contents\Components;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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
            'name' => 'Voters Authentication',
            'description' => 'No description provided yet...'
        ];
    }

    public function onAuthenticated() {
        // To do: handle credential responses
    }
}
