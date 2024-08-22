<?php namespace Voices4Budget\Contents\Components;

use Auth;
use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Area;
use Voices4budget\Contents\Models\AreaType;
use Voices4budget\Contents\Models\Country;

/**
 * AreaTypesList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class AreaTypesList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Area Types',
            'description' => 'Display a list of Area Types'
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

    public function list() {
        $country = Auth::user()->data['country'];

        return AreaType::where('country_id', $country)
            ->orderBy('parent_id')
            ->get();
    }

    public function onAreaChanged() {
        $changedId = post('data.'.input('changed'));

        $childType = AreaType::find(input('changed'))->child;

        $areas = [];

        if ($changedId) {
            $areas = Area::find($changedId)->children;
        }

        $this->page['result'] = [
            'type' => $childType,
            'areas' => $areas
        ];
    }
}
