<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Category;

/**
 * CategoryDetail Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class CategoryDetail extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Category detail',
            'description' => 'Display detail of Category'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'categoryId' => [
                'title' => 'Category ID',
                'description' => 'The identifier of the category',
                'default' => '{{ :id }}',
                'type' => 'string',
            ]
        ];
    }

    public function category() {
        return Category::find($this->property('categoryId'));
    }
}
