<?php namespace Voices4budget\Contents\Models;

use Auth;
use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SimpleTree;
    use \October\Rain\Database\Traits\SoftDelete;

    public $implement = [
        \RainLab\Translate\Behaviors\TranslatableModel::class
    ];

    public $translatable = ['title', 'slug', 'description'];

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'voices4budget_contents_categories';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public $belongsTo = [
        'country' => [Country::class]
    ];

    public $hasMany = [
        'programs' => [Program::class],
        'votes' => [Vote::class]
    ];

    public $belongsToMany = [
        'voting_sessions' => [VotingSession::class, 'table' => 'voices4budget_contents_voting_sessions_categories'],
        'programs' => [Program::class, 'table' => 'voices4budget_contents_voting_sessions_categories']
    ];

    public function isVotedByCurrentUser($voting_session_id) {
        return $this->votes()
            ->where('user_id', Auth::user()->id)
            ->where('voting_session_id', $voting_session_id)
            ->count() > 0;
    }

    public function areSubcategoriesVotedByCurrentUser($voting_session_id) {
        return $this->children()->votedByCurrentUser($voting_session_id)->count() >= $this->children()->count();
    }

    public function scopeVotedByCurrentUser($query, $voting_session_id) {
        $query->whereHas('votes', function($q) use($voting_session_id) {
            $q->where('user_id', Auth::user()->id)
                ->where('voting_session_id', $voting_session_id);
        });
    }

    public function scopeNotVotedByCurrentUser($query, $voting_session_id) {
        $query->whereDoesntHave('votes', function($q) use($voting_session_id) {
            $q->where('user_id', Auth::user()->id)
                ->where('voting_session_id', $voting_session_id);
        });
    }

    public function scopeSubprograms($query, $voting_session_id) {
        $query->whereNotNull('parent_id')
            ->hasVotingSession($voting_session_id);
    }

    public function scopeHasVotingSession($query, $id) {
        $query->whereHas('voting_sessions', function($q) use ($id) {
            $q->where('voting_session_id', $id);
        });
    }

    public function rankedPrograms($voting_session_id, $count = null, $area_id = null) {
        $query = $this->programs()->withCount([
            'votes' => function($q) use ($voting_session_id, $area_id) {
                $q->where('voting_session_id', $voting_session_id);
            }
        ])
            ->orderBy('votes_count', 'desc');

        if ($count) {
            $query->take($count);
        }

        $programs = $query->get();

        $dusun = Area::where('area_type_id', 'dusun')
            ->get();

        foreach ($programs as $program) {
            $program->votesByAge = Vote::with('user')->where('voting_session_id', $voting_session_id)
                ->where('program_id',$program->id)
                ->get()
                ->groupBy('user.data.age')
                ->mapWithKeys(function($item, $key) {
                    return [$key => count($item)];
                });
            
            $program->votesByGender = Vote::with('user')->where('voting_session_id', $voting_session_id)
                ->where('program_id',$program->id)
                ->get()
                ->groupBy('user.data.gender')
                ->mapWithKeys(function($item, $key) {
                    return [$key => count($item)];
                });


            $program->votesByDusun = Vote::with('user')->where('voting_session_id', $voting_session_id)
                ->where('program_id',$program->id)
                ->get()
                ->groupBy('user.data.area-dusun')
                ->mapWithKeys(function($item, $key) use ($dusun) {
                    return [$dusun->where('id', $key)->first()->name ?? 'others' => count($item)];
                });
        }

        return $programs;
    }

    public function getCountryOptions() {
        return Country::lists('name', 'id');
    }

    public function getVotingSessionsOptions($scopes = null) {
        $scopeName = post('scopeName');
        $country = post('value');

        if ($scopeName == 'country' && $country) {
            return VotingSession::where('country_id', $country)->lists('name', 'id');
        }
        else {
            return VotingSession::lists('name', 'id');
        }
    }

    public function scopeApplyVotingSessionFilter($query, $scope) {
        $query->whereHas('voting_sessions', function($q) use ($scope) {
            $q->where('voices4budget_contents_voting_sessions.id', $scope->value);
        });
    }
    
    public function nextCategory($voting_session_id) {
        $parents = self::hasVotingSession($voting_session_id)
            ->whereNull('parent_id')->get();

        foreach ($parents as $parent) {
            foreach ($parent->children()->hasVotingSession($voting_session_id)->get() as $child) {
                if (!$child->isVotedByCurrentUser($voting_session_id)) {
                    return $child;
                }
            }
        }

        return null;
    }

}
