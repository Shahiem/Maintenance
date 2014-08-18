<?php
use Cms\Classes\Page;
use Backend\Facades\BackendAuth;
use ShahiemSeymor\Maintenance\Models\Settings;

Route::get('/maintenance-example', function()
{
    $model = new Settings;
	return View::make('shahiemseymor.maintenance::page')->with(array(
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
																'domain'         => Settings::get('domain')
															));
});

App::before(function($request) 
{
 	$backendPrefix = str_replace('/', '', Config::get('cms.backendUri', 'backend'));

 	if(!Request::is($backendPrefix.'/*') && !Request::is($backendPrefix))
 	{
 		if(Settings::get('maintenance') == TRUE && !BackendAuth::check())
		{
			Route::any('{all}', function($slug)
			{
			    $model = new Settings;
				return View::make('shahiemseymor.maintenance::page')->with(array(
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
																'domain'         => Settings::get('domain')
															));
			})->where('all', '(.*)?');
		}
	}
});