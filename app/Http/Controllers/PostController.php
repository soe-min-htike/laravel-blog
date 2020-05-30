<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('search')){
            $posts = Post::where('title','like', '%' .request('search').'%')
            ->orderBy('id','desc')->paginate(6);
            $category = Category::all();
        }
        else{
            $posts = Post::orderBy('id', 'desc')->paginate(6);
            $category = Category::all();
        }        
        return view('welcome',compact('posts','category'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $posts=new Post();
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->user_id = $request->user_id;
        $posts->category_id= $request->category;
        //Image Upload
        $filename = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('upload', $filename);
        $posts->image = $filename;

        $posts->save();
        return redirect('admin/post/create')->with('status','Post Create Success');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('posts.view',compact('post','comments'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $categories = Category::all();
        return view('posts.edit',compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->user_id= $request->user_id;

        $filename = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('upload', $filename);
        $post->image = $filename;

        $post->save();
        return redirect('/home')->with('status','Post Update Success');
    }

    public function categoryshow($id)
    {
        $posts = Post::where('category_id','=',"$id")->orderBy('id','desc')->paginate(6);
        return view('posts.categoryshow',compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect('/home')->with('status','Delete Success');
    }

    public function photodel($id)
    {
        $post = Post::findOrFail($id);

        Storage::delete('upload/' . $post->image);
        $post->image = '';
        return back();
    }
}
