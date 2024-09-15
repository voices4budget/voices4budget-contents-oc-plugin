<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Setting;

/**
 * Settings Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Settings extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Settings',
            'description' => 'Pass settings to '
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function get($key) {
        return Setting::get($key, '');
    }
}
