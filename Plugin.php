<?php
/**
 * Created by ShahiemSeymor.
 * Date: 6/3/14
 */

namespace ShahiemSeymor\Maintenance;

use App;
use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name' => 'Maintenance Plugin',
            'description' => 'Maintenance system.',
            'author' => 'ShahiemSeymor',
            'icon' => 'icon-wrench'
        ];
    }
    
    public function registerFormWidgets()
    {
        return [
            'ShahiemSeymor\Maintenance\FormWidgets\Color' => [
                'label' => 'Color Picker',
                'alias' => 'colorpicker'
            ]
        ];
    }

   
    public function registerReportWidgets()
    {
        return [
            'ShahiemSeymor\Maintenance\ReportWidgets\Maintenance' => [
                'label' => 'Maintenance information',
                'context' => 'dashboard'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Maintenance',
                'description' => 'Manage maintenance settings.',
                'category'    => 'System',
                'class'       => 'ShahiemSeymor\Maintenance\Models\Settings',
                'icon' => ' icon-wrench'
            ]
        ];
    }

}
