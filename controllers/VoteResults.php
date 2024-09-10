<?php namespace Voices4Budget\Contents\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Carbon\Carbon;
use Voices4budget\Contents\Models\Area;
use Voices4budget\Contents\Models\AreaType;
use Voices4budget\Contents\Models\Category;
use Voices4budget\Contents\Models\Country;
use Voices4budget\Contents\Models\Stakeholder;
use Voices4budget\Contents\Models\Vote;
use Voices4budget\Contents\Models\VotingSession;

/**
 * Vote Results Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class VoteResults extends Controller
{
    public $requiredPermissions = [
        'voices4budget.voteresults.read' 
    ];
    

    /**
     * @var array required permissions
     */
    // public $requiredPermissions = ['voices4budget.contents.voteresults'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Voices4budget.Contents', 'voting', 'vote-results');
        
    }

    public function ages() {
        return [
            '17-25' => '17-25',
            '26-45' => '26-45',
            '46-65' => '46-65',
            'others' => e(trans('voices4budget.contents::lang.entity.user.attributes.age.others'))
        ];
    }

    public function genders() {
        return [
            'MALE' => e(trans('voices4budget.contents::lang.entity.user.attributes.gender.male')),
            'FEMALE' => e(trans('voices4budget.contents::lang.entity.user.attributes.gender.female')),
            'OTHERS' => e(trans('voices4budget.contents::lang.entity.user.attributes.gender.others'))
        ];
    }

    public function index() {
        $this->pageTitle = 'Vote Results';
        $this->vars['countries'] = Country::all();
        $this->vars['votingSessions'] = VotingSession::all();
        $this->vars['age_ranges'] = $this->ages();
        $this->vars['genders'] = $this->genders();
        $this->vars['villages'] = Area::where('area_type_id', 'dusun')
            ->get();
        $this->vars['areaType'] = AreaType::whereHas('parent', function($q) {
            $q->where('parent_id', null);
        })->first();
    }

    public function onChangeCountry() {
        $country_id = post('country_id');

        $this->vars['votingSessions'] = VotingSession::where('country_id', $country_id)->get();

        return [
            'partialContents' => $this->makePartial('voting_sessions')
        ];
    }

    public function onChangeSession() {
        $session_id = post('session_id');
        
        $this->vars['session_id'] = $session_id;
        $this->vars['categories'] = Category::whereHas('voting_sessions', function($q) use ($session_id) {
            $q->where('voices4budget_contents_voting_sessions.id', $session_id);
        })->whereNull('parent_id')->get();
        
        $this->vars['age_ranges'] = $this->ages();
        $this->vars['genders'] = $this->genders();
        $this->vars['villages'] = Area::where('area_type_id', 'dusun')
            ->get();
        $this->vars['voting_session'] = VotingSession::find($session_id);
        $this->vars['now'] = Carbon::now();

        return [
            '#resultHeader' => $this->makePartial('header'),
            '#resultRows' => $this->makePartial('categories'),
            '#signature_section' => $this->makePartial('signatures')
        ];
    }
}
