<?php namespace Voices4budget\Contents\Models;

use Model;
use RainLab\User\Models\User;

/**
 * Model
 */
class Idea extends Model
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
    public $table = 'voices4budget_contents_ideas';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'description' => ['required'],
        'user_id' => ['required'],
        'category_id' => [ 'required' ]
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'description'
    ];

    public $belongsTo = [
        'user' => [User::class],
        'category' => [Category::class]
    ];

}
