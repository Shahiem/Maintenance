<?php
use Cms\Classes\Page;
use Backend\Facades\BackendAuth;
use ShahiemSeymor\Maintenance\Models\Settings;

Route::get('/maintenance-example', function()
{
	return View::make('shahiemseymor.maintenance::page')->with(Settings::getSettingsArray());
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
				return View::make('shahiemseymor.maintenance::page')->with(Settings::getSettingsArray());
			})->where('all', '(.*)?');
		}
	}
});