<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Posts;
use App\Models\Comments;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::where('user_id',Auth::user()->id)->get();
        
        return view('posts.userPosts',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //forma za novi post
    {
        return view('posts.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ddd($request->image);
        $post = $this->validatePost();
        $post = Posts::create([
            'title' => $post['title'],
            'body' => $post['body'],
            'user_id' => Auth::user()->id,
            'image' => $request->image->store('images')
        ]);
        
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return view('posts.view',['post' => $post,'comments' => Comments::where('post_id',$post->id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        //if($post->user_id !== Auth::user()->id) abort(401); //AuthPolicy
        //$this->authorize('update',$post); // edit == update , set as global based Authorizaton
        return view('posts.edit',[
            'post' => Posts::where('id',$post->id)->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        //if($post->user_id !== Auth::user()->id) abort(401); //AuthPolicy
        $this->authorize('update',$post);
        if($request->image){
            $post['image'] = $request->image->store('images');
        }
        $post->update($this->validatePost());

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('posts.index');
    }

    protected function validatePost(){
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
    }
}
