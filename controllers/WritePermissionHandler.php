<?php namespace Voices4budget\Contents\Controllers;

use BackendAuth;

trait WritePermissionHandler {

    public function listGetConfig($definition)
    {
        $config = $this->asExtension('ListController')->listGetConfig($definition);

        $permissionGranted = BackendAuth::userHasAccess('voices4budget.'.$this->entity_code.'.write');

        if (!$permissionGranted) {
            $config->structure['showCheckboxes'] = false;
            $config->structure['recordUrl'] = null;
            $config->structure['showReorder'] = false;
            $config->toolbar['buttons'] = null;
        }

        return $config;
    }
}