<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Posts; // pastikan model Post ada



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts
        $posts = Posts::all(); // ambil semua postingan dari database
        return view('posts.index', ['posts' => $posts]); // arahkan ke view



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = new Posts();
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->slug = $request->input('slug');
        $posts->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
