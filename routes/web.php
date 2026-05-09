<?php

use App\Models\Idea;

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
  
    // $ideas = Idea::where('state', 'pending')->get();
    $ideas = Idea::query()
            ->when(request('state'), function($query, $state){
                // dd($state);
                $query->where('state', $state);
            })->get();

    return view('ideas', [
        'ideas' => $ideas
    ]);
});

Route::post('/ideas', function(){
    
    $idea = request('idea');

   Idea::create([
        'description' => request('idea'),
        'state' => 'pending'

   ]);

    return redirect('/');
});

// Temporary
Route::get('/delete-ideas', function(){
    session()->forget('ideas');
    return redirect('/');
});
