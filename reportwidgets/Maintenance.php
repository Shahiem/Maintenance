<?php namespace ShahiemSeymor\Maintenance\ReportWidgets;

use ShahiemSeymor\Maintenance\Models\Settings;
use Backend\Classes\ReportWidgetBase;

class Maintenance extends ReportWidgetBase
{

    public function widgetDetails()
    {
        return [
            'name'        => 'Maintenance information',
            'description' => 'Maintenance information.'
        ];
    }

    public function render()
    {
       return $this->makePartial('widget', ['maintenanceStatus' => Settings::get('maintenance')]);
    }

}