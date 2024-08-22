<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\VotingSession;

/**
 * ActiveVotingSession Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ActiveVotingSession extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Active Voting Session',
            'description' => 'Provide the data of currently active voting session'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function session() {
        return VotingSession::where('is_active', '1')
            ->first();
    }
}
