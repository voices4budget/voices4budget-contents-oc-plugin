<?php

namespace Voices4Budget\Contents\Components;

use AjaxException;
use Auth;
use Carbon\Carbon;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google_Client;
use RainLab\User\Components\Authentication;
use RainLab\User\Models\User;
use Stevebauman\Location\Facades\Location;
use System\Models\File;
use Voices4budget\Contents\Models\Country;
use Voices4budget\Contents\Models\Setting;

/**
 * VotersAuthentication Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class VotersAuthentication extends Authentication
{
    protected $google_client_id;

    public function componentDetails()
    {
        return [
            'name' => 'Voters Authentication',
            'description' => 'Handle authentication of voters'
        ];
    }

    public function init() {
        $this->google_client_id = Setting::instance()->get('misc_google_client_id', '');
    }

    public function onAuthenticated()
    {
        $credential = post('credential');

        $payload = $this->verifyIdToken($credential);

        $user = User::firstOrNew([
            'username' => $payload['email'],
            'email' => $payload['email']
        ]);

        $new = false;

        if (!$user->id) {   
            $user->first_name = $payload['given_name'];
            $user->last_name = $payload['family_name'] ?? '';
            $user->activated_at = Carbon::now();
            $user->data = [
                'country' => $this->getCountryCode()
            ];
            
            $user->save();

            $new = true;
        }

        $user->avatar = (new File)->fromUrl($payload['picture']);

        $user->save();

        Auth::login($user, true);

        return [
            'success' => true,
            'new' => $new
        ];
    }

    protected function parseJwt($credential)
    {
        return json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $credential)[1]))));
    }

    protected function verifyIdToken($idToken)
    {
        $client = new Google_Client(['client_id' => $this->google_client_id]);  // Specify the CLIENT_ID of the app that accesses the backend
        $payload = $client->verifyIdToken($idToken);

        if (!$payload) {
            throw new AjaxException(__('msg.login.invalid'));
        }

        return $payload;
    }

    protected function getCountryCode() {
        $position = Location::get();

        $country = Country::find($position->countryCode);

        if (!$country) {
            $country = Country::default();
        }

        return $country->id;
    }
}
