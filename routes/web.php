<?php

use App\Models\Idea;

use Illuminate\Support\Facades\Route;



// index
Route::get('/ideas', function(){
  
    // $ideas = Idea::where('state', 'pending')->get();
    $ideas = Idea::all();

    return view('ideas.index', [
        'ideas' => $ideas
    ]);
});


// show
Route::get('/ideas/{idea}', function(Idea $idea){
  
    // $ideas = Idea::where('state', 'pending')->get();

    // $idea = Idea::find($id);
    // if(is_null($idea)){
    //     abort(404);
    // }
    // $idea = Idea::findOrFail($idea); 

    return view('ideas.show', [
        'idea' => $idea
    ]);
});

// edit
Route::get('/ideas/{idea}/edit', function(Idea $idea){

    return view('ideas.edit', [
        'idea' => $idea
    ]);
});

// update
Route::patch('/ideas/{idea}', function(Idea $idea){
    $idea->update([
        'description' => request('description'),
    ]);

    return redirect('ideas/'. $idea->id);
});


// store
Route::post('/ideas', function(){

   Idea::create([
        'description' => request('description'),
        'state' => 'pending'

   ]);

    return redirect('/ideas');
});

//destroy
Route::delete('/ideas/{idea}', function(Idea $idea){
    
    $idea->delete($idea->id);

    return redirect('/ideas');
});

