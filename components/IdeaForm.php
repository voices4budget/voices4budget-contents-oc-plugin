<?php namespace Voices4Budget\Contents\Components;

use Auth;
use Cms\Classes\ComponentBase;
use Flash;
use Voices4budget\Contents\Models\Idea;

/**
 * IdeaForm Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class IdeaForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Idea Form',
            'description' => 'Display the form of idea'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function onSubmit() {
        Idea::create([
            'user_id' => Auth::user()->id,
            'category_id' => post('category_id'),
            'description' => post('idea')
        ]);
    }
}
