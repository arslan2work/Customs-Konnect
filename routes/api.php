<?php

use Illuminate\Http\Request;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
// use App\Events\SendLocation;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'user' => 'API\UserController'
]);
Route::apiResources([
    'truck' => 'API\TruckController'
]);
Route::apiResources([
    'trailer' => 'API\TrailerController'
]);
Route::apiResources([
    'driver' => 'API\DriverController'
]);
Route::apiResources([
    'shipper' => 'API\ShipperController'
]);
Route::apiResources([
    'aci' => 'API\ACIeManifest'
]);
Route::apiResources([
    'ace' => 'API\ACEeManifest'
]);
Route::apiResources([
    'bond' => 'API\InBonds'
]);
Route::apiResources([
    'company' => 'API\CompanyController'
]);
Route::apiResources([
    'custom' => 'API\CustomsController'
]);

Route::get('/profile', 'API\UserController@profile');
Route::get('/findUser', 'API\UserController@search');
Route::put('/profile', 'API\UserController@updateProfile');

Route::get('/findTruck', 'API\TruckController@search');
Route::get('/findTrailer', 'API\TrailerController@search');
Route::get('/findDriver', 'API\DriverController@search');
Route::get('/findShipper', 'API\ShipperController@search');
Route::get('/findAci', 'API\ACIeManifest@search');
Route::get('/findAce', 'API\ACEeManifest@search');
Route::get('/findBond', 'API\InBonds@search');
Route::get('/findCompany', 'API\CompanyController@search');
Route::get('/getUser', 'API\UserController@users');


Route::get('/todos', 'TodoController@index');
Route::post('/createtodo', 'TodoController@store');



Route::get('/plans', 'PlanController@index')->name('plans.index');
Route::get('/plans/{plan}', 'PlanController@show')->name('plans.show');
Route::get('/subscription', 'SubscriptionController@create')->name('subscription.plan');
Route::get('create/plan', 'SubscriptionController@createPlan')->name('create.plan');
Route::get('store/plan', 'SubscriptionController@storePlan')->name('store.plan');

