<?php namespace Voices4budget\Contents\Models;

use Model;

/**
 * Model
 */
class Country extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'voices4budget_contents_countries';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
