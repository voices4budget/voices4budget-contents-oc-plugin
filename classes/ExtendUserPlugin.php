<?php namespace Voices4budget\Contents\Classes;

use Backend\Controllers\Users;
use Backend\Widgets\Form;
use Config;
use October\Rain\Extension\Container as ExtensionContainer;
use Voices4budget\Contents\Models\Area;
use Voices4budget\Contents\Models\AreaType;
use Voices4budget\Contents\Models\Country;

/**
 * ExtendUserPlugin
 */
class ExtendUserPlugin
{
    /**
     * subscribe
     */
    public function subscribe($events)
    {
        $this->extendUserModel();

        // User

        $events->listen('backend.form.extendFields', [static::class, 'extendUserFormFields']);

        $events->listen('backend.list.extendColumns', [static::class, 'extendUserListColumns']);

        $events->listen('backend.filter.extendScopes', [static::class, 'extendUserFilterScopes']);

        // Settings

        $this->extendSettingModel();

        $events->listen('backend.form.extendFields', [static::class, 'extendSettingFormFields']);

        $events->listen('rainlab.user.view.extendPreviewTabs', function() {
            return [
                'Profile' => '$/voices4budget/contents/partials/_user_profile.php',
            ];
        });
    }

    /**
     * extendUserModel
     */
    public function extendUserModel()
    {
        ExtensionContainer::extendClass(\RainLab\User\Models\User::class, static function($model) {
            unset($model->rules['password']);
            $model->addJsonable('data');
            $model->belongsTo['area'] = [\Voices4budget\Contents\Models\Area::class];
            $model->addFillable(['data']);

            $model->addDynamicMethod('getDropdownOptions', function($fieldName, $value, $formData) use($model) {
                if (str_starts_with($fieldName, 'area-')) {
                    if (!property_exists($formData, 'country')) {
                        $formData->country = 'ID';
                    }

                    $type = str_replace('area-', '', $fieldName);

                    $area_type = AreaType::find($type);

                    $query = Area::where('country_id', $formData->country)
                        ->where('area_type_id', $type);

                    if ($area_type->parent_id && property_exists($formData, 'area-' . $area_type->parent_id)) {
                        $query->where('parent_id', $formData->{'area-' . $area_type->parent_id});
                    }

                    return $query->get()->mapWithKeys(function($item) {
                        return [$item->id => $item->name];
                    });
                }

                if ($fieldName == 'country') {
                    return Country::all()->mapWithKeys(function($item) {
                        return [$item->id => $item->name];
                    });
                }
            });
        });
    }

    /**
     * extendSettingModel
     */
    public function extendSettingModel()
    {
        ExtensionContainer::extendClass(\RainLab\User\Models\Setting::class, static function($model) {
            // $model->bindEvent('model.initSettingsData', function() use ($model) {
            //     $model->use_address_book = Config::get('rainlab.userplus::use_address_book', true);
            // });
        });
    }

    /**
     * extendSettingFormFields
     */
    public function extendSettingFormFields(\Backend\Widgets\Form $widget)
    {
        if (!$this->checkControllerMatchesSetting($widget)) {
            return;
        }
    }

    /**
     * extendUserFormFields
     */
    public function extendUserFormFields(\Backend\Widgets\Form $widget)
    {
        if ($widget->isNested || !$this->checkControllerMatchesUser($widget)) {
            return;
        }

        $widget->removeField('password');
        $widget->removeField('password_confirmation');
        $widget->removeField('_password_ruler');
        $widget->removeField('_group_ruler');
        $widget->removeField('primary_group');
        $widget->removeField('groups');
        $widget->removeField('is_mail_blocked');
        $widget->removeField('is_two_factor_enabled');

        $dataFields = [
            'age' => [
                'label' => 'Age',
                'type' => 'dropdown',
                'span' => 'auto',
                'options' => [
                    '17-25' => '17 - 25 years old',
                    '26-45' => '26 - 45 years old',
                    '45-65' => '45 - 65 years old',
                    'others' => 'Others'
                ]
            ],
            'gender' => [
                'label' => 'Gender',
                'type' => 'dropdown',
                'span' => 'auto',
                'options' => [
                    'MALE' => 'Male',
                    'FEMALE' => 'Female',
                    'OTHERS' => 'Others'
                ]
            ],
            'country' => [
                'label' => 'Country',
                'type' => 'dropdown',
                'tab' => 'Profile',
                'span' => 'auto'
            ]
        ];

        $area_types = AreaType::whereNull('parent_id')->get();

        foreach ($area_types as $type) {
            $area = $type;

            while ($area) {

                $dataFields['area-' . $area->id] = [
                    'label' => $area->name,
                    'type' => 'dropdown',
                    'tab' => 'Profile',
                    'span' => 'auto',
                    'trigger' => [
                        'action' => 'show',
                        'field' => 'country',
                        'condition' => "value[$area->country_id]"
                    ],
                    'placeholder' => "-- Choose $area->name --"
                ];

                $dataFields['area-' . $area->id]['dependsOn'] = $area->parent ? 'area-' . $area->parent->id : 'country';

                $area = $area->children->first();
            }
        }

        $widget->addTabFields([
            'data' => [
                'type' => 'nestedform',
                'showPanel' => false,
                'tab' => 'Profile',
                'form' => [
                    'fields' => $dataFields
                ]
            ]
        ]);
    }

    /**
     * extendUserListColumns
     */
    public function extendUserListColumns(\Backend\Widgets\Lists $widget)
    {
        if (!$this->checkControllerMatchesUser($widget)) {
            return;
        }

        // $widget->defineColumn('company', "Company")->after('email')->searchable();


    }

    /**
     * extendUserFilterScopes
     */
    public function extendUserFilterScopes(\Backend\Widgets\Filter $widget)
    {
        
    }

    /**
     * checkUseAddressBook
     */
    protected function checkUseAddressBook(): bool
    {
        return \RainLab\User\Models\Setting::get('use_address_book', true);
    }

    /**
     * checkControllerMatchesUser
     */
    protected function checkControllerMatchesUser($widget): bool
    {
        return $widget->getController() instanceof \RainLab\User\Controllers\Users &&
            $widget->getModel() instanceof \RainLab\User\Models\User;
    }

    /**
     * checkControllerMatchesSetting
     */
    protected function checkControllerMatchesSetting($widget): bool
    {
        return $widget->getController() instanceof \System\Controllers\Settings &&
            $widget->getModel() instanceof \RainLab\User\Models\Setting;
    }
}