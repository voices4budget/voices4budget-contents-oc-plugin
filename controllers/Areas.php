<?php namespace Voices4budget\Contents\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Areas extends Controller
{
    use WritePermissionHandler;

    public $entity_code = 'areas';

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'voices4budget.areas.read',
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Voices4budget.Contents', 'locations', 'areas');
    }

    

}
