<?php namespace Voices4Budget\Contents\Components;

use Auth;
use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Comment;
use Voices4budget\Contents\Models\Program;

/**
 * ProgramsList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ProgramsList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Programs List',
            'description' => 'Display a list of programs'
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

    public function programs() {
        return Program::where('category_id', $this->property('categoryId'))
            ->get();
    }
}
