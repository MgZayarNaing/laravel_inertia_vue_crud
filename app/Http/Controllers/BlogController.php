<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs =  Blog::query()->when($request->search, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
                // ->OrWhere('content', 'like', '%' . $search . '%');
        })->paginate(10)->withQueryString();

        return Inertia::render(
            'Blogs/Index',
            [
                'blogs' => $blogs,
                'filters' => ['search'=>$request->search]
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Blogs/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
        Blog::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        sleep(1);
        return redirect()->route('blogs.index')->with('message', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return Inertia::render(
            'Blogs/Edit',['blog' => $blog]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $blog->title = $request->title;

        $blog->content = $request->content;
        $blog->save();
        sleep(1);

        return redirect()->route('blogs.index')->with('message', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        sleep(1);

        return redirect()->route('blogs.index')->with('message', 'Blog Delete Successfully');
    }
}
