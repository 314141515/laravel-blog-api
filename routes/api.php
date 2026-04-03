<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', function () {
    return response()->json(\App\Models\Post::latest()->get());
});

Route::get('/posts/{post}', function (\App\Models\Post $post) {
    return response()->json($post);
});