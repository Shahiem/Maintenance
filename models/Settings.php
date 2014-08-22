<?php 
/**
 * Created by ShahiemSeymor.
 * Date: 6/3/14
 */
namespace ShahiemSeymor\Maintenance\Models;

use Model;

class Settings extends Model
{
    
    use \October\Rain\Database\Traits\Validation;
    
    public $implement      = ['System.Behaviors.SettingsModel'];
    public $settingsCode   = 'maintenance_settings';
    public $settingsFields = 'fields.yaml';
    public $requiredPermissions = ['acme.blog.access_dposts'];
    public $attachOne      = [
        'logo'             => ['System\Models\File'],
        'background_image' => ['System\Models\File']
    ];

    public $rules          = [
        'title'            => 'required',
        'description'      => 'required'
    ];

    public static function getSettingsArray()
    {
        $settingsArray = array(
                                'logo'           => Settings::getLogo(), 
                                'title'          => Settings::get('title'), 
                                'enable_bgimage' => Settings::get('enable_bgimage'), 
                                'bg_image'       => Settings::getBGImage(), 
                                'bg_repeat'      => Settings::get('background_repeat'),
                                'bg_fixed'       => Settings::get('background_fixed'),
                                'css'            => Settings::replaceWords(Settings::get('css')), 
                                'description'    => Settings::get('description'),
                                'enable_ga'      => Settings::get('enable_ga'),
                                'tracking_id'    => Settings::get('tracking_id'),
                                'domain'         => Settings::get('domain'));
        return $settingsArray;
    }
    
    public static function replaceWords($css)
    {
    	$bgColor  = (Settings::get('background_color') != '' ? Settings::get('background_color') : 'eee');
    	$txtColor = (Settings::get('text_color') != '' ? Settings::get('text_color') : '444');
      	$commands = array("_BGCOLOR", "_TXTCOLOR");
		$values   = array($bgColor, $txtColor);
		$replace  = str_replace($commands, $values, $css);

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