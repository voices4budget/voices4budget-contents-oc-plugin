<?php namespace Voices4budget\Contents\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class AreaTypes extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'voices4budget.areatypes.read' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Voices4budget.Contents', 'locations', 'areatypes');
    }

}
