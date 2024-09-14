<?php namespace Voices4budget\Contents\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use BackendAuth;

class Votes extends Controller
{
    use WritePermissionHandler;

    public $entity_code = 'votes';

    public $implement = [
        \Backend\Behaviors\ListController::class
    ];

    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'voices4budget.votes.read' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Voices4budget.Contents', 'voting', 'votes');
    }

}
