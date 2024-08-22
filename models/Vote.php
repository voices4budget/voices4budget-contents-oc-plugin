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

}
