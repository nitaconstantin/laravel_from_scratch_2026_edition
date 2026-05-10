<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\IdeaController;
use App\Models\Idea;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;



Route::get('/', function(){
    return 'Placeholder for home page';
});

Route::middleware('auth')->group(function(){
    // index
    Route::get('/ideas', [IdeaController::class, 'index'])->middleware('auth');

    // create
    Route::get('/ideas/create', [IdeaController::class, 'create']);

    // show
    Route::get('/ideas/{idea}',[IdeaController::class, 'show']);

    // edit
    Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);

    // store
    Route::post('/ideas',[IdeaController::class, 'store']);

    // update
    Route::patch('/ideas/{idea}',[IdeaController::class, 'update']);

    //destroy
    Route::delete('/ideas/{idea}',[IdeaController::class, 'destroy']);

    // log out user
    Route::delete('/logout', [SessionController::class, 'destroy']);
});



Route::middleware('guest')->group(function(){
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
});

// Route::get('/admin', function(){
//     return 'Private admin only area';
// })->can('view-admin');

// Route::get('/admin', function(){
//     Gate::authorize('view-admin');
// });






