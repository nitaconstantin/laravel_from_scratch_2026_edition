<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $ideas = Idea::all();
        // $ideas = Idea::query()->where([
        //     'user_id' => Auth::id(),
        // ])->get();
        // $ideas = Auth::user()->ideas;
        return view('ideas.index', [
            'ideas' => Auth::user()->ideas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Gate::authorize('create', Idea::class);
        return view('ideas.create');
    }

     /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {

    Gate::authorize('update', $idea);

    // if(Auth::user()->cannot('update', $idea)){
    //     dd('not authorized');
    // }
       
    return view('ideas.show', [
        'idea' => $idea
    ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)   
    {
        
        // Idea::create([
        //     'description' => request('description'),
        //     // 'user_id' => Auth::id(),
        //     'state' => 'pending',
        //     'user_id' => Auth::id(),

        // ]);
        Auth::user()->ideas()->create([
            'description' => request('description'),
            'state' => 'pending',
        ]);
        return redirect('/ideas');
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);
        return view('ideas.edit', ['idea' => $idea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        Gate::authorize('update', $idea);
        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
         Gate::authorize('update', $idea);
        $idea->delete($idea->id);
        return redirect('/ideas');

    }
}
