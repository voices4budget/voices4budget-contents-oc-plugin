<?php namespace Voices4budget\Contents\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class Categories extends Controller
{
    use WritePermissionHandler;

    public $entity_code = 'categories';

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'voices4budget.categories.read' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Voices4budget.Contents', 'voting', 'categories');
    }

}
