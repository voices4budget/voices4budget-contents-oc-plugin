<?php namespace Voices4budget\Contents\Models;

use Model;

/**
 * Model
 */
class AreaType extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SimpleTree;
    use \October\Rain\Database\Traits\SoftDelete;

    public $implement = [
        \RainLab\Translate\Behaviors\TranslatableModel::class
    ];

    public $translatable = ['name', 'description'];

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    protected $keyType = 'string';

    public $incrementings = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'voices4budget_contents_area_types';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public $belongsTo = [
        'country' => [Country::class],
    ];

    public $hasMany = [
        'areas' => [Area::class],
    ];

    public $hasOne = [
        'child' => [AreaType::class, 'key' => 'parent_id']
    ];
}
