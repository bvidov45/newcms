<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Post;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
      return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0){

            Session::flash('info', 'You must have categories before posts');
            return redirect()->back();
        }
        $select= [];
        foreach($categories as $category){
            $select[$category->id] = $category->name;
        }

        return view('admin.posts.create')->with('select', $select);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'title'    => 'required',
           'featured' => 'image|required',
           'content'  => 'required',
           'category_id' => 'required'
       ]);
        
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);
        $post->save();

        Session::flash('success', 'Post successfully created');
        return redirect()->back();

    
       

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
      
        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
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

       
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);
    
        $posts = Post::find($id);
        if($request->hasfile('featured')){
           $featured = $request->featured;
           $featured_new_name = time().$featured->getClientOriginalName();
           $featured->move('uploads/posts', $featured_new_name);
           $posts->featured = $featured_new_name;
        }

        
        $posts->title = $request->title;
        $posts->content = $request->input('content');
        $posts->category_id = $request->input('category_id');
        
        $posts->save();
        Session::flash('success', 'Post Updated Successfully');
        return redirect()->route('posts');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id);
        $post->delete();
        Session::flash('success', 'Your post has been trashed');
        return redirect()->back();
    }
    
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id){
       $post = Post::withTrashed()->where('id', $id)->first();
       $post->forceDelete();
       Session::flash('success', 'Your post has been permanently deleted' );
       return redirect()->back();
    }

    public function restore($id){
       $post = Post::withTrashed()->where('id', $id)->first();
       $post->restore();
       Session::flash('success', 'Post Successfully restored');
       return redirect()->route('posts');

    }


}
