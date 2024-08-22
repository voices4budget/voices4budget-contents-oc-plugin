<?php namespace Voices4Budget\Contents\Components;

use Cms\Classes\ComponentBase;
use Voices4budget\Contents\Models\Area;
use Voices4budget\Contents\Models\Category;
use Voices4budget\Contents\Models\Program;
use Voices4budget\Contents\Models\Vote;
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

        $program = Program::with('category.parent')->find($program_id);

        $dusun = Area::where('area_type_id', 'dusun')
            ->get();

        $total = $votesByAge = Vote::with('user')->where('voting_session_id', $voting_session_id)
            ->where('program_id', $program_id)
            ->count();

        $votesByAge = Vote::with('user')->where('voting_session_id', $voting_session_id)
            ->where('program_id', $program_id)
            ->get()
            ->groupBy('user.data.age')
            ->mapWithKeys(function($item, $key) {
                return [$key => count($item)];
            });
        
        $votesByGender = Vote::with('user')->where('voting_session_id', $voting_session_id)
            ->where('program_id', $program_id)
            ->get()
            ->groupBy('user.data.gender')
            ->mapWithKeys(function($item, $key) {
                return [$key => count($item)];
            });


        $votesByDusun = Vote::with('user')->where('voting_session_id', $voting_session_id)
            ->where('program_id', $program_id)
            ->get()
            ->groupBy('user.data.area-dusun')
            ->mapWithKeys(function($item, $key) use ($dusun) {
                return [$dusun->where('id', $key)->first()->name => count($item)];
            });

        return [
            'success' => true,
            'program' => $program,
            'total' => $total,
            'age' => $votesByAge,
            'gender' => $votesByGender,
            'dusun' => $votesByDusun
        ];
    }
}
