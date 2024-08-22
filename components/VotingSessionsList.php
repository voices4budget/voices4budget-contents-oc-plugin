<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Category;
use Voices4budget\Contents\Models\VotingSession;

/**
 * VotingSessionsList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class VotingSessionsList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Voting Sessions',
            'description' => 'Display a list of voting sessions'
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
        return VotingSession::ended()
            ->orderBy('ends_at', 'desc')->get();
    }

    public function onShowFullRanking() {
        $voting_session_id = post('voting_session_id');
        $category_id = post('category_id');

        $this->page['rankedPrograms'] = Category::find($category_id)->rankedPrograms($voting_session_id);
    }

    public function onGetVotesChartData() {
        $voting_session_id = post('voting_session_id');
        $program_id = post('program_id');

        $this->page['rankedPrograms'] = Category::find($category_id)->rankedPrograms($voting_session_id);
    }
}
