<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\contact;

class FrontEndcontroller extends Controller
{

    public function home(Request $request)
    {

        $posts = Post::with('category', 'user')->take(5)->get();
        $firstposts = $posts->splice(0, 2);
        $middlepost = $posts->splice(0, 1);
        $lastposts = $posts->splice(0, 2);
        if ($request->has('q')) {
            $q = $request->q;
            $recentposts = post::where([
                ['title', 'like', '%' . $q . '%'],
            ])->orderBy('id', 'desc')->paginate(9);
        } else {
            $recentposts = Post::with('category', 'user')->orderBy('id', 'desc')->paginate(9);
        }

        // $posts = Post::with('category', 'user')->inRandomorder()->take(5)->get();
        $ffirstposts = $posts->splice(0, 1);
        $fmiddlepost = $posts->splice(0, 1);
        $flastposts = $posts->splice(0, 2);

        return view('front.home', compact(['posts', 'recentposts', 'firstposts', 'middlepost', 'lastposts', 'ffirstposts', 'fmiddlepost', 'flastposts']));
    }

    public function category($slug)
    {

        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $relatedposts = Post::where('category_id', $category->id)->orderBy('created_at', 'asc')->paginate(9);
            return view('front.category', compact(['relatedposts', 'category',]));
        } else {
            return redirect()->route('website');
        }
    }
    public function tag($slug)
    {

        $tag = Tag::where('slug', $slug)->first();
        if ($tag) {
            $relatedposts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);

            return view('front.tag', compact(['tag', 'relatedposts']));
        } else {
            return redirect()->route('website');
        }
    }

    public function post($slug)
    {

        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $post->increment('views');
        $tags = Tag::all();

        // Popular posts//
        // $relatedpost =  Post::orderby('category_id', 'Asc')->inRandomorder()->take(4)->get();
        $popularpost =  Post::orderby('views', 'desc')->take(4)->get();
        //sum of posts per category
        $categories = Category::with('post')->get();
        //
        $posts = Post::with('category')->where('category_id', $post->category_id)->inRandomorder()->take(5)->get();
        $ffirstposts = $posts->splice(0, 1);
        $fmiddlepost = $posts->splice(0, 1);
        $flastposts = $posts->splice(0, 2);

        if ($post) {
            return view('front.post', compact('post', 'popularpost', 'categories', 'tags', 'posts', 'ffirstposts', 'fmiddlepost', 'flastposts'));
        } else {
            return redirect('/');
        }
    }

    public function aboutus()
    {
        $users = user::all();
        return view('front.aboutus', compact('users'));
    }

    public function contactus()
    {
        return view('front.contactus');
    }
    public function contact_message(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $contacts = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success', 'Record created successfully');
    }

    public function bio($id)
    {
        $user = User::where('id', $id)->first();
        $myposts = Post::where('user_id', $user->id)->get();
        $unique = $myposts->unique('category_id');
        $unique->values()->all();

        $topposts =  Post::where([
            ['user_id', $user->id],
        ])->orderBy('views', 'desc')->paginate(2);
        $uniqued = $myposts->unique('category_id');
        $uniqued->values()->all();
        $posts = Post::where([
            ['user_id', $user->id],
        ])->orderBy('id', 'desc')->paginate(4);



        return view('front.bio', compact('user', 'posts', 'myposts', 'unique', 'topposts', 'uniqued'));
    }
}
