<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


    Route::get('/', array('as' => 'home_path', 'uses' => 'HomeController@index'));
	Route::get('user', array('as' => 'user.index', 'uses' => 'UserController@index'));
	Route::get('register', array('as' => 'news.register', 'uses' => 'UserController@register'));
	Route::post('user/store', array('as' => 'user.store', 'uses' => 'UserController@store'));
	Route::get('login', array('as' => 'news.login', 'uses' => 'UserController@login'));
	Route::post('user/authenticate', array('as' => 'user.authenticate', 'uses' => 'UserController@authenticate'));
	Route::get('logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
	Route::get('news/account', array('as' => 'news.account', 'uses' => 'UserController@account'))->middleware('auth');

	Route::get('forgotpassword', array('as' => 'news.forgotpassword', 'uses' => 'UserController@forgotpassword'));
	Route::post('forgotpassword', array('as' => 'news.forgotpassword', 'uses' => 'UserController@forgotpassword'));

	Route::get('resetpassword/{token}', array('as' => 'news.resetpassword', 'uses' => 'UserController@resetpassword'));
	Route::get('resetpassword', array('as' => 'news.resetpassword', 'uses' => 'UserController@resetpassword'));
	Route::post('resetpassword/{token}', array('as' => 'news.resetpassword', 'uses' => 'UserController@resetpassword'));
	
	Route::get('confirmation/{token}', array('as' => 'user.confirmation', 'uses' => 'UserController@confirmation'));
	
	Route::get('contact_us', array('as' => 'news.contact-us', 'uses' => 'HomeController@contactus'));
	Route::post('contact_us', array('as' => 'news.contact-us', 'uses' => 'HomeController@contactus'));
	
	Route::get('edit_profile', array('as' => 'news.edit-profile', 'uses' => 'UserController@editprofile'))->middleware('auth');
	Route::post('edit_profile', array('as' => 'news.edit-profile', 'uses' => 'UserController@editprofile'))->middleware('auth');
	Route::get('request_for_professtional', 'UserController@sendRquestProfessional')->middleware('auth');
	

Route::group(['middleware' => 'admin.middleware'], function () {
	Route::get('admin',array('as' => 'admin.admindashboard', 'uses'=>'AdminController@admindashboard'));
	Route::get('ad_changepassword', array('as' => 'admin.adminchangepassword', 'uses' => 'UserController@adminchangepassword'));
	Route::post('ad_changepassword', array('as' => 'admin.adminchangepassword', 'uses' => 'UserController@adminchangepassword'));
	
	Route::get('users',array('as' => 'admin.admin_userlist', 'uses'=>'AdminController@index'));
	Route::post('users',array('as' => 'admin.admin_userlist', 'uses'=>'AdminController@index'));
	Route::get('user/{id}', array('as' => 'admin.edit', 'uses' => 'AdminController@edit'));
	Route::post('user/{id}', array('as' => 'admin.edit', 'uses' => 'AdminController@edit'));
	Route::get('delete_user/{id}', array('as' => 'admin.destroy', 'uses' => 'AdminController@destroy'));
	Route::get('professional_list',array('as' => 'admin.professional_list', 'uses'=>'AdminController@professionalList'));
	Route::post('professional_list',array('as' => 'admin.professional_list', 'uses'=>'AdminController@professionalList'));
	Route::get('view_professional/{id}',array('as' => 'admin.view_professional', 'uses'=>'AdminController@viewProfessionalList'));
	Route::post('view_professional/{id}',array('as' => 'admin.view_professional', 'uses'=>'AdminController@viewProfessionalList'));
	Route::get('approve_professional_request/{id}/{is_approve}', 'AdminController@approveProfessionalrequest');
	Route::get('more_info/{id}',array('as' => 'admin.more_info', 'uses'=>'AdminController@more_info'));
	Route::post('more_info/{id}',array('as' => 'admin.more_info', 'uses'=>'AdminController@more_info'));


	
	Route::post('catagory', array('as' => 'categories.add', 'uses' => 'CategoriesController@add'));
	Route::get('catagory/{id}', array('as' => 'categories.add', 'uses' => 'Cat	egoriesController@add'));
	Route::post('catagory/{id}', array('as' => 'categories.add', 'uses' => 'CategoriesController@add'));
	Route::get('catagory', array('as' => 'categories.add', 'uses' => 'CategoriesController@add'));
	Route::put('catagory', array('as' => 'categories.add', 'uses' => 'CategoriesController@add'));
	Route::get('catagories', array('as' => 'categories.index', 'uses' => 'CategoriesController@index'));
	Route::get('delete_category/{id}', array('as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy'));
	
	Route::post('location', array('as' => 'locations.add', 'uses' => 'LocationController@add'));
	Route::get('location/{id}', array('as' => 'locations.add', 'uses' => 'LocationController@add'));
	Route::post('location/{id}', array('as' => 'locations.add', 'uses' => 'LocationController@add'));
	Route::get('location', array('as' => 'locations.add', 'uses' => 'LocationController@add'));
	Route::put('location', array('as' => 'locations.add', 'uses' => 'LocationController@add'));
	Route::get('locations', array('as' => 'locations.index', 'uses' => 'LocationController@index'));
	Route::get('delete_location/{id}', array('as' => 'locations.destroy', 'uses' => 'LocationController@destroy'));
	
	Route::post('static_pages', array('as' => 'cmspages.add', 'uses' => 'CmspagesController@add'));
	Route::get('static_pages/{id}', array('as' => 'cmspages.add', 'uses' => 'CmspagesController@add'));
	Route::get('static_pages', array('as' => 'cmspages.add', 'uses' => 'CmspagesController@add'));
	Route::post('static_pages/{id}', array('as' => 'cmspages.add', 'uses' => 'CmspagesController@add'));
	Route::put('static_pages', array('as' => 'cmspages.add', 'uses' => 'CmspagesController@add'));
	Route::get('staticpages', array('as' => 'cmspages.admin_index', 'uses' => 'CmspagesController@index'));
	Route::get('delete_page/{id}', array('as' => 'cmspages.destroy', 'uses' => 'CmspagesController@destroy'));

	Route::get('cmsemails', array('as' => 'cmsemails.admin_index', 'uses' => 'CmsemailsController@index'));
	Route::get('cmsemail/{id}', array('as' => 'cmsemails.edit', 'uses' => 'CmsemailsController@edit'));
	Route::post('cmsemail/{id}', array('as' => 'cmsemails.edit', 'uses' => 'CmsemailsController@edit'));
	Route::put('cmsemail', array('as' => 'cmsemails.edit', 'uses' => 'CmsemailsController@edit'));
	
	Route::post('slider_images', array('as' => 'sliders.add', 'uses' => 'SliderimagesController@add'));
	Route::get('slider_images', array('as' => 'sliders.add', 'uses' => 'SliderimagesController@add'));
	Route::post('slider_images/{id}', array('as' => 'sliders.add', 'uses' => 'SliderimagesController@add'));
	Route::get('slider_images/{id}', array('as' => 'sliders.add', 'uses' => 'SliderimagesController@add'));
	Route::put('slider_images', array('as' => 'sliders.add', 'uses' => 'SliderimagesController@add'));
	Route::get('sliders', array('as' => 'sliders.index', 'uses' => 'SliderimagesController@index'));
	Route::get('delete_sliderimage/{id}', array('as' => 'sliders.destroy', 'uses' => 'SliderimagesController@destroy'));
	
	
});

	Route::get('socialAuth/{provider}', array("as" => "socialAuth", 'uses'=>'UserController@getSocialLogin'));
	
	Route::get('twitterCallBack', array("as" => "twitterCallBack", 'uses'=>'UserController@twitterCallBack'));
	Route::get('facebookCallBack', array("as" => "facebookCallBack", 'uses'=>'UserController@facebookCallBack'));
	Route::get('googleCallBack', array("as" => "goolgeCallBack", 'uses'=>'UserController@googleCallBack'));
	
	//Route::get('gettwitter', array("as" => "gettwitter", 'uses'=>'UserController@callback'));
	Route::get('logout', array("as" => 'logout', 'uses'=>'UserController@logout'));

