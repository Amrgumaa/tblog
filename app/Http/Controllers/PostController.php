<?php

namespace App\Http\Controllers;


use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact(['categories', 'tags']));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'category_id' => 'required',

        ]);
        // dd($request->all());
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'published_at' => carbon::now(),
        ]);
        $post->tags()->attach($request->tags);
        $post->save();

        if ($request->hasFile('image')) {
            $image =  request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('public' . '/' . 'posts', $post->id . '/' . $image, '');
            $post->update(['image' => $image]);
        }
        return redirect()->route('post.create')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        // Popular posts//
        $relatedpost =  Post::orderby('category_id', 'Asc')->inRandomorder()->take(4)->get();
        //sum of posts per category
        $categories = Category::with('post')->get();
        //
        $posts = Post::with('category', 'user')->inRandomorder()->take(4)->get();
        $ffirstposts = $posts->splice(0, 1);
        $fmiddlepost = $posts->splice(0, 1);
        $flastposts = $posts->splice(0, 2);

        if ($post) {
            // return view('admin.post.show', compact('post', 'relatedpost', 'categories', 'tags', 'posts', 'ffirstposts', 'fmiddlepost', 'flastposts'));
            return view(('admin.post.show'), compact(['post', 'relatedpost', 'categories', 'tags', 'posts', 'ffirstposts', 'fmiddlepost', 'flastposts']));
        } else {
            return redirect('/admin/post');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view(('admin.post.edit'), compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $request->validate([
            'title' => "required|unique:posts,title,$post->id",
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->category_id = $request->category_id;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image =  request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('public' . '/' . 'posts', $post->id . '/' . $image, '');
            $post->update(['image' => $image]);
        }
        $post->tags()->sync($request->tags);
        $post->save();




        return redirect()->route('post.index')->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            if (file_exists(public_path('storage/posts/' . $post->id . '/' . $post->image))) {
                unlink(public_path('storage/posts/' . $post->id . '/' . $post->image));
            }

            $post->delete();
            return redirect()->route('post.index')
                ->with('success', 'Record deleted successfully');
        }
    }
}
