<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\data;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/ajax-form', function (Request $request) {
    $name = $request->input('name');
    $phone = $request->input('phone');
    $link_fb = $request->input('link_share');
    $currentPos = $request->input('currentPos');

    $data = new data();
    $data->name = $name;
    $data->phone = $phone;
    $data->link_fb = $link_fb;
    $data->aff = $currentPos;

    $data->save();
    return \response()->json(['status' => true]);
});
