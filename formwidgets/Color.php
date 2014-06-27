<?php namespace ShahiemSeymor\Maintenance\FormWidgets;

use Backend\Classes\FormWidgetBase;

class Color extends FormWidgetBase
{

   public function widgetDetails()
    {
        return [
            'name'        => 'Color Picker',
            'description' => 'Pick a color.'
        ];
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('color');
    }

    public function prepareVars()
    {
         $this->vars['name'] = $this->formField->getName();
         $this->vars['value'] = $this->model->{$this->columnName};
    }

    public function loadAssets()
    {
        $this->addCss('css/spectrum.css');
        $this->addJs('js/spectrum.js');
    }


}