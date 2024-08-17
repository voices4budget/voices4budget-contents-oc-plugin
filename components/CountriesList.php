<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Country;

/**
 * CountriesList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class CountriesList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Countries List',
            'description' => 'Display a list of countries'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function countries() {
        return Country::all();
    }
}
