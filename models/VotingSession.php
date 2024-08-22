<?php namespace Voices4budget\Contents\Models;

use Auth;
use Carbon\Carbon;
use Model;

/**
 * Model
 */
class VotingSession extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['starts_at', 'ends_at', 'deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'voices4budget_contents_voting_sessions';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'categories' => [Category::class, 'table' => 'voices4budget_contents_voting_sessions_categories']
    ];

    public function hasEnded() {
        return Carbon::now()->gte($this->ends_at);
    }

    public function scopeEnded($query) {
        $query->where('ends_at', '<=', Carbon::now());
    }

}
