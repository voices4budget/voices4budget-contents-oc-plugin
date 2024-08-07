<?php namespace Voices4budget\Contents\Classes;

use Config;
use October\Rain\Extension\Container as ExtensionContainer;

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

        $events->listen('rainlab.user.view.extendPreviewTabs', [static::class, 'extendPreviewTabs']);

        $events->listen('backend.form.extendFields', [static::class, 'extendUserFormFields']);

        $events->listen('backend.list.extendColumns', [static::class, 'extendUserListColumns']);

        $events->listen('backend.filter.extendScopes', [static::class, 'extendUserFilterScopes']);

        // Settings

        $this->extendSettingModel();

        $events->listen('backend.form.extendFields', [static::class, 'extendSettingFormFields']);
    }

    /**
     * extendUserModel
     */
    public function extendUserModel()
    {
        ExtensionContainer::extendClass(\RainLab\User\Models\User::class, static function($model) {
            
        });
    }

    /**
     * extendSettingModel
     */
    public function extendSettingModel()
    {
        ExtensionContainer::extendClass(\RainLab\User\Models\Setting::class, static function($model) {
            $model->bindEvent('model.initSettingsData', function() use ($model) {
                $model->use_address_book = Config::get('rainlab.userplus::use_address_book', true);
            });
        });
    }

    /**
     * extendPreviewTabs
     */
    public function extendPreviewTabs()
    {
        return [
            "Profile" => $this->checkUseAddressBook()
                ? '$/rainlab/userplus/partials/_user_address_book.php'
                : '$/rainlab/userplus/partials/_user_profile.php'
        ];
    }

    /**
     * extendSettingFormFields
     */
    public function extendSettingFormFields(\Backend\Widgets\Form $widget)
    {
        if (!$this->checkControllerMatchesSetting($widget)) {
            return;
        }

        $widget->addTabField('use_address_book', 'Use Address Book')->displayAs('switch')->tab("Profile")->span('full')
            ->comment("Allow users to manage multiple addresses, otherwise users can provide only a single address.");
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