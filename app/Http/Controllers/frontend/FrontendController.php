<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $all_category = Category::where('status' , '0')->get();
        $all_post = Post::where('status' , '0')->orderBy('created_at', 'DESC')->get()->take(10);
        return view('frontend.index',compact('all_category', 'all_post'));
    }

    public function  viewcategorypost($category_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if ($category) {
            $post = Post::where('category_id',$category->id)->where('status','0')->paginate(2);
            return view('frontend.post.index',compact('post','category')); 
    }
    else{
return redirect('/');
    }

}
public function viewpost($category_slug , $post_slug){
    $category = Category::where('slug',$category_slug)->where('status','0')->first();
    if ($category) {
        $post = Post::where('category_id',$category->id)->where('slug', $post_slug)->where('status','0')->first();
        $latest_post = Post::where('category_id',$category->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(10);
        return view('frontend.post.view',compact('post','latest_post')); 
}
else{
return redirect('/');
}
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function viewcategorypost($category_slug)
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
