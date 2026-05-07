<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    $ideas = session()->get('ideas', []);

    // dd('ideas');
    return view('ideas', [
        'ideas' => $ideas
    ]);
});

Route::post('/ideas', function(){
    // dd(request()->all());
    $idea = request('idea');

    session()->push('ideas', $idea);

    return redirect('/');
});

// Temporary
Route::get('/delete-ideas', function(){
    session()->forget('ideas');
    return redirect('/');
});
