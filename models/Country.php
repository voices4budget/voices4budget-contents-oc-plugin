<?php namespace Voices4budget\Contents\Models;

use Model;
use ValidationException;

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

    public $hasMany = [
        'areas' => [Area::class],
        'area_types' => [AreaType::class],
        'stakeholders' => [Stakeholder::class]
    ];

    public $hasOne = [
        'parent_area' => [
            Area::class, 
            'conditions' => 'parent_id is null'
        ]
    ];

    public function beforeSave() {
        if ($this->original['is_default'] != $this->is_default && $this->is_default == 1) {
            self::where('id', '!=', $this->id)
                ->update(['is_default' => 0]);
        }
    }

    public static function default() {
        return self::where('is_default')->first() ?? self::first();
    }
}
