<?php
/**
 * Created by ShahiemSeymor.
 * Date: 6/3/14
 */

namespace ShahiemSeymor\Maintenance;

use App;
use Backend;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;
use Illuminate\Foundation\AliasLoader;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'Maintenance',
            'description' => 'Create a maintenance page and block all non-logged in users from accessing your site.',
            'author'      => 'ShahiemSeymor',
            'icon'        => 'icon-wrench'
        ];
    }
    
    public function registerReportWidgets()
    {
        return [
            'ShahiemSeymor\Maintenance\ReportWidgets\Maintenance' => [
                'label'   => 'Maintenance information',
                'context' => 'dashboard'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings'        => [
                'label'       => 'Maintenance',
                'description' => 'Manage maintenance settings.',
                'category'    => SettingsManager::CATEGORY_SYSTEM,
                'class'       => 'ShahiemSeymor\Maintenance\Models\Settings',
                'icon'        => 'icon-wrench'
            ]
        ];
    }

}
