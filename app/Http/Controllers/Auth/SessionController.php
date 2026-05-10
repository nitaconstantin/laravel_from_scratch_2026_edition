<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
   

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        
        return view('auth.login');
    }

    public function store(Request $request){
        //validate
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', Password::default()]
        ]);
        //attempt a login
        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect('/ideas');
        };

        //redirect
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records',
            'password' => 'Password must be at least 8 charcaters'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('/ideas');
    }
}
