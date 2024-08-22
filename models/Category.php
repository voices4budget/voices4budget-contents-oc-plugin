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

    public function isVotedByCurrentUser() {
        return $this->votes()
            ->where('user_id', Auth::user()->id)
            ->count() > 0;
    }

    public function scopeVotedByCurrentUser($query) {
        $query->whereHas('votes', function($q) {
            $q->where('user_id', Auth::user()->id);
        });
    }

    public function scopeAreSubprograms($query) {
        $query->whereNotNull('parent_id');
    }

    public function rankedPrograms($voting_session_id, $count = null, $area_id = null) {
        $query = $this->programs()->withCount([
            'votes' => function($q) use ($voting_session_id, $area_id) {
                $q->where('voting_session_id', $voting_session_id);
            }
        ])->orderBy('votes_count', 'desc');

        if ($count) {
            $query->take($count);
        }

        return $query->get();
    }

}
