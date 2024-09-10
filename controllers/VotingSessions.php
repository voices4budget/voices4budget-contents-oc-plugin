<?php namespace Voices4budget\Contents\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class VotingSessions extends Controller
{
    use WritePermissionHandler;

    public $entity_code = 'votingsessions';

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'voices4budget.votingsessions.read' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Voices4budget.Contents', 'voting', 'votingsessions');
    }

}
