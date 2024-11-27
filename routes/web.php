<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['installed']], function () {
    Auth::routes(['verify' => false]);
});

Route::group(['prefix' => 'install', 'as' => 'LaravelInstaller::', 'middleware' => ['web', 'install']], function () {
    Route::post('environment/saveWizard', [
        'as'   => 'environmentSaveWizard',
        'uses' => 'EnvironmentController@saveWizard',
    ]);

   
});

Route::group(['middleware' => ['installed'], 'namespace' => 'Frontend'], function () {
    Route::get('/', 'WebController@index')->name('home');
   
    Route::get('account/profile', 'AccountController@index')->name('account.profile')->middleware('auth');
    Route::get('account/password', 'AccountController@getPassword')->name('account.password')->middleware('auth');
    Route::put('account/password', 'AccountController@password_update')->name('account.password.update')->middleware('auth');
    Route::get('account/update', 'AccountController@profileUpdate')->name('account.profile.index')->middleware('auth');
    Route::put('account/update/{profile}', 'AccountController@update')->name('account.profile.update')->middleware('auth');
   
    Route::get('/privacy', 'PrivacyController')->name('privacy');
    Route::get('/terms', 'TermController')->name('terms');
    Route::get('/contact', 'ContactController')->name('contact');
    Route::post('/contact', 'ContactController@store')->name('contact.store');

    Route::get('page/{slug}', 'FrontendPageController@index')->name('page');

   
});

Route::redirect('/admin', '/admin/dashboard')->middleware('backend_permission');

Route::group(['prefix' => 'admin', 'middleware' => ['installed'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'installed', 'backend_permission'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::post('day-wise-income-order', 'DashboardController@dayWiseIncomeOrder')->name('dashboard.day-wise-income-order');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile/update/{profile}', 'ProfileController@update')->name('profile.update');
    Route::put('profile/change', 'ProfileController@change')->name('profile.change');

    Route::post('handlePaytmRequest', 'paytmcontroller@handlePaytmRequest')->name('paytm.handlePaytmRequest');
    Route::get('paytm-callback', 'PaytmController@paytmCallback');

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/', 'SettingController@index')->name('index');
        Route::post('/', 'SettingController@siteSettingUpdate')->name('site-update');
        Route::get('sms', 'SettingController@smsSetting')->name('sms');
        Route::post('sms', 'SettingController@smsSettingUpdate')->name('sms-update');
        Route::get('payment', 'SettingController@paymentSetting')->name('payment');
        Route::post('payment', 'SettingController@paymentSettingUpdate')->name('payment-update');
        Route::get('email', 'SettingController@emailSetting')->name('email');
        Route::post('email', 'SettingController@emailSettingUpdate')->name('email-update');
        Route::get('notification', 'SettingController@notificationSetting')->name('notification');
        Route::post('notification', 'SettingController@notificationSettingUpdate')->name('notification-update');
        Route::get('social-login', 'SettingController@socialLoginSetting')->name('social-login');
        Route::post('social-login', 'SettingController@socialLoginSettingUpdate')->name('social-login-update');
        Route::get('otp', 'SettingController@otpSetting')->name('otp');
        Route::post('otp', 'SettingController@otpSettingUpdate')->name('otp-update');
        Route::get('homepage', 'SettingController@homepageSetting')->name('homepage');
        Route::post('homepage', 'SettingController@homepageSettingUpdate')->name('homepage-update');

        Route::get('homepage', 'SettingController@homepageSetting')->name('homepage');
        Route::post('homepage', 'SettingController@homepageSettingUpdate')->name('homepage-update');

        Route::get('social', 'SettingController@socialSetting')->name('social');
        Route::post('social', 'SettingController@socialSettingUpdate')->name('social-update');
    });

    Route::resource('organisations', 'OrganisationController');
    Route::get('get-organisations', 'OrganisationController@getOrganisations')->name('organisations.get-organisations');
    Route::post('organisations-store', 'OrganisationController@store')->name('organisations.organisations-store');

    Route::resource('exams', 'ExamsController');
    Route::get('get-exams', 'ExamsController@getexams')->name('exams.get-exams');
    Route::post('exams-store', 'ExamsController@store')->name('exams.exams-store');


    Route::resource('students', 'StudentController');
    Route::get('get-students', 'StudentController@getStudents')->name('students.get-students');

    Route::resource('page', 'PageController');
    Route::get('get-page', 'PageController@getPage')->name('page.get-page');

 
    Route::resource('banner', 'BannerController');
    Route::post('sort-banner', 'BannerController@sortBanner')->name('sort.banner');

    Route::resource('administrators', 'AdministratorController');
    Route::get('get-administrators', 'AdministratorController@getAdministrators')->name('administrators.get-administrators');

    Route::resource('customers', 'CustomerController');
    Route::get('get-customers', 'CustomerController@getCustomers')->name('customers.get-customers');

  
    Route::resource('role', 'RoleController');
    Route::post('role/save-permission/{id}', 'RoleController@savePermission')->name('role.save-permission');

   
});

Route::get('webview/paypal/{id}', 'Admin\WebviewController@paypal')->name('webview.paypal');
Route::post('webview/paypal/payment', 'Admin\WebviewController@paypalpayment')->name('webview.paypal.payment');
Route::get('webview/paypal/{id}/return', 'Admin\WebviewController@paypalReturn')->name('webview.paypal.return');
Route::get('webview/paypal/{id}/cancel', 'Admin\WebviewController@paypalCancel')->name('webview.paypal.cancel');

Route::get('webview/stripe', 'Admin\WebviewController@stripe')->name('webview.stripe');
Route::get('webview/stripe', 'Admin\WebviewController@stripe')->name('webview.stripe');

Route::get('paypal/ec-checkout', 'Admin\PayPalController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'Admin\PayPalController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'Admin\PayPalController@getAdaptivePay');
Route::post('paypal/notify', 'Admin\PayPalController@notify');
