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

Route::get('/toggleLocale', ['as'=>'lang.switch', 'uses' => 'LanguageController@toggleLang']);

// Home routes
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');

// About routes
Route::get('/about', 'AboutController@index');
Route::get('/about/team', 'AboutController@team');
Route::get('/about/alumni', 'AboutController@alumni');
Route::get('/about/boa', 'AboutController@boa');

// Speakers routes
Route::get('/speakers/{id?}', 'SpeakersController@index')->where('id', '[0-9]+');

// Award routes
Route::get('/award', 'AwardController@index');

// Contact routes
Route::get('/contact', 'ContactController@index');
Route::post('/contact/post', 'ContactController@post');

// Partners routes
Route::get('/partners', 'PartnersController@index');

// Administration routes
// Dashboard
Route::get('/administration-dashboard', "AdminController@index");
Route::get('/administration-dashboard/logout', 'Admin\DashboardController@logout');
Route::get('/administration-dashboard/dashboard', "Admin\DashboardController@dashboard");

Route::post('/administration-dashboard/login', 'Admin\DashboardController@login');

// Contact entries
Route::get('/administration-dashboard/contact-entries', "AdminController@displayContactEntries");
Route::get('/administration-dashboard/contact-entries/delete/{id}', "AdminController@deleteContactEntries");


// Events
Route::get('/administration-dashboard/events', "AdminController@displayEvents");
Route::get('/administration-dashboard/events/delete/{id}', "AdminController@deleteEvents");
Route::get('/administration-dashboard/events/add', "AdminController@addEvents");
Route::get('/administration-dashboard/events/edit/{id}', "AdminController@editEvents");

Route::post('/administration-dashboard/events/modify', "AdminController@modifyEvents");

//Advisers

Route::get('/administration-dashboard/advisers', "AdminController@displayAdvisers");
Route::get('/administration-dashboard/advisers/delete/{id}', "AdminController@deleteAdvisers");
Route::get('/administration-dashboard/advisers/add', "AdminController@addAdvisers");
Route::get('/administration-dashboard/advisers/edit/{id}', "AdminController@editAdvisers");

Route::post('/administration-dashboard/advisers/modify', "AdminController@modifyAdvisers");

//Alumni

Route::get('/administration-dashboard/alumni', "AdminController@displayAlumni");
Route::get('/administration-dashboard/alumni/delete/{id}', "AdminController@deleteAlumni");
Route::get('/administration-dashboard/alumni/add', "AdminController@addAlumni");
Route::get('/administration-dashboard/alumni/edit/{id}', "AdminController@editAlumni");

Route::post('/administration-dashboard/alumni/modify', "AdminController@modifyAlumni");

//Speakers

Route::get('/administration-dashboard/speakers', "AdminController@displaySpeakers");
Route::get('/administration-dashboard/speakers/delete/{id}', "AdminController@deleteSpeakers");
Route::get('/administration-dashboard/speakers/add', "AdminController@addSpeakers");
Route::get('/administration-dashboard/speakers/edit/{id}', "AdminController@editSpeakers");

Route::post('/administration-dashboard/speakers/modify', "AdminController@modifySpeakers");

//Partners

Route::get('/administration-dashboard/partners', "AdminController@displayPartners");
Route::get('/administration-dashboard/partners/delete/{id}', "AdminController@deletePartners");
Route::get('/administration-dashboard/partners/add', "AdminController@addPartners");
Route::get('/administration-dashboard/partners/edit/{id}', "AdminController@editPartners");

Route::post('/administration-dashboard/partners/modify', "AdminController@modifyPartners");

//Partnership Type

Route::get('/administration-dashboard/partnership-types', "AdminController@displayPartnershiptypes");
Route::get('/administration-dashboard/partnership-types/delete/{id}', "AdminController@deletePartnershiptypes");
Route::get('/administration-dashboard/partnership-types/add', "AdminController@addPartnershiptypes");
Route::get('/administration-dashboard/partnership-types/edit/{id}', "AdminController@editPartnershiptypes");

Route::post('/administration-dashboard/partnership-types/modify', "AdminController@modifyPartnershiptypes");

//Team members

Route::get('/administration-dashboard/team-members', "AdminController@displayTeammembers");
Route::get('/administration-dashboard/team-members/delete/{id}', "AdminController@deleteTeammembers");
Route::get('/administration-dashboard/team-members/add', "AdminController@addTeammembers");
Route::get('/administration-dashboard/team-members/edit/{id}', "AdminController@editTeammembers");

Route::post('/administration-dashboard/team-members/modify', "AdminController@modifyTeammembers");

//Admin accounts

Route::get('/administration-dashboard/admin-accounts', "AdminController@displayAdminaccounts");
Route::get('/administration-dashboard/admin-accounts/delete/{id}', "AdminController@deleteAdminaccounts");
Route::get('/administration-dashboard/admin-accounts/add', "AdminController@addAdminaccounts");
Route::get('/administration-dashboard/admin-accounts/edit/{id}', "AdminController@editAdminaccounts");

Route::post('/administration-dashboard/admin-accounts/modify', "AdminController@modifyAdminaccounts");