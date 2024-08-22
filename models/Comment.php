<?php namespace Voices4budget\Contents\Models;

use Model;
use RainLab\User\Models\User;

/**
 * Model
 */
class Comment extends Model
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
    public $table = 'voices4budget_contents_comments';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    protected $fillable = [
        'user_id',
        'program_id',
        'voting_session_id',
        'comment'
    ];

    public $belongsTo = [
        'user' => [User::class],
        'program' => [Program::class],
        'voting_session' => [VotingSession::class]
    ];

    public function scopeCurrentSessionBy($query, $user_id) {
        return $query->whereHas('voting_session', function($q) {
                $q->where('is_active', 1);
            })
            ->where('user_id', $user_id);
    }

}
