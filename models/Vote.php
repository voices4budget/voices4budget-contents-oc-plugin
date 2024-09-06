<?php namespace Voices4budget\Contents\Models;

use Model;
use RainLab\User\Models\User;

/**
 * Model
 */
class Vote extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'voices4budget_contents_votes';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    protected $fillable = [
        'user_id',
        'voting_session_id',
        'category_id',
        'program_id'
    ];

    public $belongsTo = [
        'user' => [User::class],
        'voting_session' => [VotingSession::class],
        'category' => [Category::class],
        'program' => [Program::class]
    ];

    public function getCountryOptions() {
        return Country::lists('name', 'id');
    }

    public function scopeApplyCountryFilter($query, $scope) {
        $query->whereHas('voting_session', function($q) use($scope) {
            $q->where('country_id', $scope->value);
        });
    }

    public function getVotingSessionOptions($scopes = null) {
        $scopeName = post('scopeName');
        $country = post('value');

        $votingSessions = VotingSession::query();

        if ($scopeName == 'country' && $country) {
            $votingSessions->where('country_id', $country);
        }

        return $votingSessions->lists('name', 'id');
    }

    public function getCategoryOptions() {
        $scopeName = post('scopeName');
        $votingSession = post('value');
        
        $categories = Category::query();

        if ($scopeName == 'voting_session' && $votingSession) {
            $categories->whereHas('voting_sessions', function($q) use ($votingSession) {
                $q->where('voices4budget_contents_voting_sessions.id', $votingSession);
            });
        }

        return $categories->listsNested('title', 'id');
    }

    public function scopeApplyCategoryFilter($query, $scope) {
        $query->whereHas('program', function($q) use($scope) {
            $q->whereHas('category', function($q2) use($scope) {
                $q2->where('parent_id', $scope->value);
            })->orWhere('category_id', $scope->value);
        });
    }

    public function getProgramOptions() {
        $scopeName = post('scopeName');
        $category = post('value');
        
        $programs = Program::query();

        if ($scopeName == '_category' && $category) {
            $programs->where('category_id', $category)
                ->orWhereHas('category', function($q) use($category) {
                    $q->where('parent_id', $category);
                });
        }

        return $programs->lists('title', 'id');
    }

}
