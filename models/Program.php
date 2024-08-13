<?php namespace Voices4budget\Contents\Models;

use Model;

/**
 * Model
 */
class Program extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    public $implement = [
        \RainLab\Translate\Behaviors\TranslatableModel::class
    ];

    public $translatable = ['title', 'slug', 'goal', 'description'];

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'voices4budget_contents_programs';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public $belongsTo = [
        'category' => [Category::class]
    ];

    public $belongsToMany = [
        'voting_sessions' => [VotingSession::class, 'table' => 'voices4budget_contents_voting_sessions_programs']
    ];
}
