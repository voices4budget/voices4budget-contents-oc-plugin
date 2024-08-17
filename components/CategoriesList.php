<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Category;

/**
 * CategoriesList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class CategoriesList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Categories List',
            'description' => 'Display a list of categories'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function categories() {
        return Category::whereNull('parent_id')->get();
    }
}
