<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* user section */

Route::get('/', 'PublicController@index')->name('public.index');

Route::post('/', 'PublicController@search')->name('public.search');

Route::post('/login', 'LoginController@userVerify')->name('login.userVerify');

Route::get('/password/reset', 'PasswordController@index')->name('password.index');
Route::post('/password/reset', 'PasswordController@resetRequest')->name('password.resetRequest');

Route::get('/password/{token}/{id}', 'PasswordController@passToken')->name('password.passToken');

Route::get('/password/reset-password', 'PasswordController@edit')->name('password.edit');
Route::post('/password/reset-password', 'PasswordController@update')->name('password.update');

Route::get('/ajax/login', 'UserAjaxController@verify')->name('userAjax.verify');

Route::get('/ajax/checkUsername', 'UserAjaxController@checkUsername')->name('userAjax.checkUsername');

Route::get('/ajax/checkEmail', 'UserAjaxController@checkEmail')->name('userAjax.checkEmail');

Route::get('/ajax/store', 'UserAjaxController@store')->name('userAjax.store');

Route::post('/registration', 'RegistrationController@store')->name('registration.store');

Route::get('/registration/{token}/{id}', 'RegistrationController@regToken')->name('registration.regToken');

Route::group(['middleware' => ['userSess']], function (){

    Route::get('/user', 'UserController@index')->name('user.index');

    Route::post('/user', 'UserController@searchUser')->name('user.searchUser');

    Route::get('/profile', 'UserController@profile')->name('user.profile');

    Route::get('/profile/{user}', 'UserController@publicProfile')->name('user.publicProfile');

    Route::post('/profile/{user}', 'UserController@showInterest')->name('user.publicProfile');

    Route::get('/update-profile', 'AccountController@editProfile')->name('account.updateProfile');

    Route::post('/update-profile', 'AccountController@updateProfile')->name('account.updateProfile');

    Route::get('/family', 'AccountController@family')->name('account.family');

    Route::post('/family', 'AccountController@updateFamily')->name('account.family');

    Route::get('/per-address','AccountController@perAddress')->name('account.perAddress')->middleware('userSess');

    Route::post('/per-address','AccountController@updatePerAddress')->name('account.perAddress');

    Route::get('/pr-address','AccountController@prAddress')->name('account.prAddress');

    Route::post('/pr-address','AccountController@updatePrAddress')->name('account.prAddress');

    Route::get('/education', 'AccountController@education')->name('account.education');

    Route::post('/education', 'AccountController@updateEducation')->name('account.education');

    Route::get('/occupation', 'AccountController@occupation')->name('account.occupation');

    Route::post('/occupation', 'AccountController@updateOccupation')->name('account.occupation');

    Route::get('/life-style', 'AccountController@lifeStyle')->name('account.lifeStyle');

    Route::post('/life-style', 'AccountController@updateLifeStyle')->name('account.lifeStyle');

    Route::get('/change-password', 'AccountController@editPassword')->name('account.changePassword');

    Route::post('/change-password', 'AccountController@updatePassword')->name('account.changePassword');

    Route::get('/profile-picture', 'AccountController@proPic')->name('account.proPic');

    Route::post('/profile-picture', 'AccountController@updateProPic')->name('account.proPic');

    Route::get('/favorite-list', 'UserController@favoriteList')->name('user.favoriteList');

    Route::post('/favorite-list', 'UserController@removeFavorite')->name('user.favoriteList');

    Route::get('/follower-list', 'UserController@followerList')->name('user.followerList');

    Route::get('/sent-request-list', 'UserController@sentRequests')->name('user.sentRequests');

    Route::post('/sent-request-list', 'UserController@cancelRequest')->name('user.sentRequests');

    Route::get('/request-list', 'UserController@requestList')->name('user.requestList');

    Route::post('/request-list', 'UserController@decideRequest')->name('user.requestList');

    Route::get('/friend-list', 'UserController@friendList')->name('user.friendList');

    Route::post('/friend-list', 'UserController@cancelFriend')->name('user.friendList');

    Route::get('/new-messages', 'UserController@newMessages')->name('user.newMessages');

    Route::get('/logout', 'LogoutController@index')->name('logout.index');

    Route::get('/ajax/friend-reqs', 'UserAjaxController@friendReqNumber')->name('userAjax.friendReqNum');

    Route::post('/ajax/send-message', 'UserAjaxController@sendMessage')->name('userAjax.sendMessage');

    Route::get('/ajax/unseen-message', 'UserAjaxController@unseenMessage')->name('userAjax.unseenMessage');

    Route::post('/ajax/read-message', 'UserAjaxController@readMessage')->name('userAjax.readMessage');

    Route::post('/ajax/message-contents', 'UserAjaxController@messageContents')->name('userAjax.messageContents');
});

/* end user section */

/* admin section */

Route::get('/admin/login', 'LoginController@adminLogin' )->name('login.admin');

Route::post('/admin/login', 'LoginController@adminVerify' )->name('login.adminVerify');

Route::get('/admin/reset-password', 'AdminPasswordController@index' )->name('adminPassword.index');
Route::post('/admin/reset-password', 'AdminPasswordController@resetRequest' )->name('adminPassword.resetRequest');

Route::get('/admin/password/{token}/{id}', 'AdminPasswordController@passToken')->name('adminPassword.passToken');

Route::get('/admin/password/reset-password', 'AdminPasswordController@edit')->name('adminPassword.edit');
Route::post('/admin/password/reset-password', 'AdminPasswordController@update')->name('adminPassword.update');

Route::group(['middleware' => ['adminSess']], function (){
    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::get('/admin/user-list', 'AdminController@userList')->name('admin.userList');

    Route::get('/admin/active-users', 'AdminController@activeUsers')->name('admin.activeUsers');

    Route::get('/admin/user/{id}', 'AdminController@userProfile')->name('admin.userProfile');

    Route::get('/admin/profile', 'AdminController@profile' )->name('admin.profile');

    Route::get('/admin/update-profile', 'AdminController@editProfile')->name('admin.updateProfile');

    Route::post('/admin/update-profile', 'AdminController@updateProfile')->name('admin.updateProfile');

    Route::get('/admin/password', 'AdminController@editPassword')->name('admin.updatePassword');

    Route::post('/admin/password', 'AdminController@updatePassword')->name('admin.updatePassword');

    Route::get('/admin/profile-picture', 'AdminController@proPic')->name('admin.proPic');

    Route::post('/admin/profile-picture', 'AdminController@updateProPic')->name('admin.proPic');

    Route::get('/admin/registration-requests', "AdminController@registrationRequest")->name('admin.registrationRequest');

    Route::post('/admin/registration-requests', "AdminController@storeRegistration")->name('admin.registrationRequest');

    Route::get('/admin/police-station', 'InformationController@policeStation')->name('information.police');

    Route::post('/admin/police-station', 'InformationController@storePoliceStation')->name('information.police');

    Route::get('/admin/police-station/{ps}', 'InformationController@editPoliceStation')->name('information.updatePolice');

    Route::post('/admin/police-station/{ps}', 'InformationController@updatePoliceStation')->name('information.updatePolice');

    Route::get('/admin/district', "InformationController@district")->name('information.district');

    Route::post('/admin/district', "InformationController@storeDistrict")->name('information.district');

    Route::get('/admin/district/{district}', "InformationController@editDistrict")->name('information.updateDistrict');

    Route::post('/admin/district/{district}', "InformationController@updateDistrict")->name('information.updateDistrict');

    Route::get('/admin/division', "InformationController@division")->name('information.division');

    Route::post('/admin/division', "InformationController@storeDivision")->name('information.division');

    Route::get('/admin/division/{division}', "InformationController@editDivision")->name('information.updateDivision');

    Route::post('/admin/division/{division}', "InformationController@updateDivision")->name('information.updateDivision');

    Route::get('/admin/degree', "InformationController@degree")->name('information.degree');

    Route::post('/admin/degree', "InformationController@storeDegree")->name('information.degree');

    Route::get('/admin/degree/{degree}', "InformationController@editDegree")->name('information.updateDegree');

    Route::post('/admin/degree/{degree}', "InformationController@updateDegree")->name('information.updateDegree');

    Route::get('/admin/family', "InformationController@family")->name('information.family');

    Route::post('/admin/family', "InformationController@storeFamily")->name('information.family');

    Route::get('/admin/family/{family}', "InformationController@editFamily")->name('information.updateFamily');

    Route::post('/admin/family/{family}', "InformationController@updateFamily")->name('information.updateFamily');

    Route::get('/admin/complexion', "InformationController@complexion")->name('information.complexion');

    Route::post('/admin/complexion', "InformationController@storeComplexion")->name('information.complexion');

    Route::get('/admin/complexion/{complexion}', "InformationController@editComplexion")->name('information.updateComplexion');

    Route::post('/admin/complexion/{complexion}', "InformationController@updateComplexion")->name('information.updateComplexion');

    Route::get('/admin/hobby', "InformationController@hobby")->name('information.hobby');

    Route::post('/admin/hobby', "InformationController@storeHobby")->name('information.hobby');

    Route::get('/admin/hobby/{hobby}', "InformationController@editHobby")->name('information.updateHobby');

    Route::post('/admin/hobby/{hobby}', "InformationController@updateHobby")->name('information.updateHobby');

    Route::get('/admin/interest', "InformationController@interest")->name('information.interest');

    Route::post('/admin/interest', "InformationController@storeInterest")->name('information.interest');

    Route::get('/admin/interest/{interest}', "InformationController@editInterest")->name('information.updateInterest');

    Route::post('/admin/interest/{interest}', "InformationController@updateInterest")->name('information.updateInterest');

    Route::get('/admin/music', "InformationController@music")->name('information.music');

    Route::post('/admin/music', "InformationController@storeMusic")->name('information.music');

    Route::get('/admin/music/{music}', "InformationController@editMusic")->name('information.updateMusic');

    Route::post('/admin/music/{music}', "InformationController@updateMusic")->name('information.updateMusic');

    Route::get('/admin/sport', "InformationController@sport")->name('information.sport');

    Route::post('/admin/sport', "InformationController@storeSport")->name('information.sport');

    Route::get('/admin/sport/{sport}', "InformationController@editSport")->name('information.updateSport');

    Route::post('/admin/sport/{sport}', "InformationController@updateSport")->name('information.updateSport');

    Route::get('/ajax/regReqNumber', "AdminAjaxController@regRequestNumber")->name('adminAjax.regReqNum');

    Route::get('/admin/logout', "LogoutController@adminLogout")->name('logout.admin');
});

/* end admin section */

Route::get('/ajax/allDistricts', "InformationAjaxController@allDistricts")->name('infoAjax.addDistricts');

Route::get('/ajax/psList', "InformationAjaxController@psListInDistrict")->name('infoAjax.psList');

Route::get('/ajax/districtList', "InformationAjaxController@districtListInDivision")->name('infoAjax.districtList');
