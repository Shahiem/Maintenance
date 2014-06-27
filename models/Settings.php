<?php 
/**
 * Created by ShahiemSeymor.
 * Date: 6/3/14
 */
namespace ShahiemSeymor\Maintenance\Models;

use Model;

class Settings extends Model
{

    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'maintenance_settings';
    public $settingsFields = 'fields.yaml';
    public $attachOne = [
        'logo' => ['System\Models\File'],
        'background_image' => ['System\Models\File'],
    ];

    public $rules = [
        'title' => 'required',
        'description' => 'required',
    ];

    public static function replaceWords($css)
    {
    	$bgColor = (Settings::get('background_color') != '' ? Settings::get('background_color') : 'eee');
    	$txtColor = (Settings::get('text_color') != '' ? Settings::get('text_color') : '444');
      	$commands = array("_BGCOLOR", "_TXTCOLOR");
		$values   = array($bgColor, $txtColor);
		$replace = str_replace($commands, $values, $css);

		return $replace;
    } 
    
    public static function getBGImage()
    {
        $getLogoQuery = Settings::where('item', '=', 'maintenance_settings')->get();
        foreach ($getLogoQuery as $value) 
        {
            if(Settings::find($value->id)->background_image)
            {
              return Settings::find($value->id)->background_image->getPath();
            }
        }
    } 
    
    public static function getLogo()
    {
        $getLogoQuery = Settings::where('item', '=', 'maintenance_settings')->get();
        foreach ($getLogoQuery as $value) 
        {
            if(Settings::find($value->id)->logo)
            {
              return Settings::find($value->id)->logo->getPath();
            }
        }
    } 
    
}