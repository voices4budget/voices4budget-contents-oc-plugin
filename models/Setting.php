<?php namespace Voices4budget\Contents\Models;

class Setting extends \System\Models\SettingModel
{
    public $implement = [
        \RainLab\Translate\Behaviors\TranslatableModel::class
    ];

    public $translatable = ['general_slogan'];

    public $settingsCode = 'voices4budget_contents_settings';

    public $settingsFields = 'fields.yaml';
}