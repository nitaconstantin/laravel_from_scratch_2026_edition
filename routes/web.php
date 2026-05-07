<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello',
    'person' => request('person', 'world') // second parameter is the default parameter
]);
