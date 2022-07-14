<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $post=Post::all();
        //dd($post);
        return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category =Category::where('status','0')->get();
        return view('admin.post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $post = new Post;
        $post->category_id=$request->category_id;
        $post->user_id = Auth::user()->id;
        $post->name=$request->name;
        $post->slug=Str::slug($request->name);
        $post->description=$request->description;
        $post->yt_iframe=$request->yt_iframe;
        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        $post->meta_keyword=$request->meta_keyword;
        $post->status=$request->status == true ? '1' : '0';
        
        //dd($post);
        $post->save();
        
       
        return redirect('/admin/post')->with('message','Post Added Successfully');
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
        $category = Category::where('status','0')->get();
        $post = Post::find($id);
        return view('admin.post.edit',compact('post','category'));
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
        //dd($request->all());
        $post = Post::find($id);
        $post->category_id=$request->category_id;
        $post->name=$request->name;
        $post->slug=Str::slug($request->slug);
        $post->description=$request->description;
        $post->yt_iframe=$request->yt_iframe;
        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        $post->meta_keyword=$request->meta_keyword;
        $post->status=$request->status == true ? '1' : '0';
        //dd($post);
        $post->save();
        return redirect('admin/post')->with('message','Post Edit Successfullys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        $post->delete();
        return redirect('admin/post')->with('message','Post Deleted Successfully');
    }
   
}
