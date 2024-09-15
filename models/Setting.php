<?php namespace Voices4budget\Contents\Models;

use System\Models\File;

class Setting extends \System\Models\SettingModel
{   
    public $implement = [
        \RainLab\Translate\Behaviors\TranslatableModel::class
    ];

    public $translatable = ['general_slogan', 'general_about'];

    public $settingsCode = 'voices4budget_contents_settings';

    public $settingsFields = 'fields.yaml';

    public $attachOne = [
        'general_about_picture' => File::class
    ];

    public $attachMany = [
        'footer_supporters' => File::class
    ];
}