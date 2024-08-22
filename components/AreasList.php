<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Area;

/**
 * AreasList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class AreasList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Areas List',
            'description' => 'Display a list of areas'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function list() {
        return Area::whereNull('parent_id')->get();
    }
}
