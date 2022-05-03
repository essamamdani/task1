<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::get("user/create", function () {
    die("yes");
});
Route::post('user/create', function () {


    $validator = Validator::make(request()->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'subscribed_website_ids' => 'required|array',
    ]);

    if ($validator->fails()) {
        return response(["errors" => $validator->errors()], 401);
    }
    $user = User::create(request()->only('name', 'email', 'password'));
    foreach (request('subscribed_website_ids') as $websiteId) {
        $user->subscribed()->create([
            'website_id' => $websiteId,
            'is_active' => true,
            'user_id' => $user->id,
        ]);
    }
    return $user;
});

Route::post('post/create', function () {
    $validator = Validator::make(request()->all(), [
        'title' => 'required|min:10',
        'description' => 'required|min:10',
        'website_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response(["errors" => $validator->errors()], 401);
    }


    return Post::create(request()->only('title', 'description', 'website_id'));
});
