<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\StudentController;
use App\Http\Controllers\MockTestController;
use App\Http\Controllers\ExamController;

Route::post('/student', [StudentController::class, 'store']);
Route::get('/organisationexam', [ExamController::class, 'getorganisationexam']);
Route::get('/mock-tests/{exam}', [StudentController::class, 'getMockTests']);
Route::post('/mock-tests', [MockTestController::class, 'store']);

use App\Http\Controllers\SubscriptionController;

Route::post('/subscriptions', [SubscriptionController::class, 'store']); // Create a new subscription
Route::get('/subscriptions/{studentId}', [SubscriptionController::class, 'getSubscriptions']); // Get all subscriptions for a student
Route::post('/subscriptions/check', [SubscriptionController::class, 'checkSubscription']); // Check subscription validity

use App\Http\Controllers\AIController;

Route::post('/ai/store-data', [AIController::class, 'storeData']); // Store data from AI
Route::get('/organizations', [AIController::class, 'fetchOrganizations']); // Fetch organizations and their exams



Route::group(['prefix' => 'v1'], function () {

    Route::post('login', 'Api\v1\Auth\LoginController@action'); //done
    Route::post('logout', 'Api\v1\Auth\LogoutController@action'); //done
    Route::post('reg', 'Api\v1\Auth\RegisterController@action'); //done

    Route::get('me', 'Api\v1\Auth\MeController@action'); //done
    Route::get('refresh', 'Api\v1\Auth\MeController@refresh'); //done
    Route::put('profile', 'Api\v1\Auth\MeController@update'); //done
    Route::put('change-password', 'Api\v1\Auth\MeController@changePassword'); //done
    Route::put('device', 'Api\v1\Auth\MeController@device'); //done
    Route::get('review', 'Api\v1\Auth\MeController@review'); //done
    Route::post('review', 'Api\v1\Auth\MeController@saveReview'); //done

    
    Route::get('settings', 'Api\v1\SettingController@index'); //done
    Route::get('banners', 'Api\v1\BannerController@index'); //done

    Route::get('locations', 'Api\v1\LocationController@index'); //done
    Route::get('locations/{id}/areas', 'Api\v1\LocationController@area'); //done
    Route::get('areas', 'Api\v1\AreaController@index'); //done

     Route::get('transactions', 'Api\v1\TransactionController@index'); //done

});
