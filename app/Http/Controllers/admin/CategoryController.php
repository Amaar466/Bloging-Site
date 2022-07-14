<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category =Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
   
        $this->postImage->add($input);
   
        return back()
            ->with('success','Image Upload successful')
            ->with('imageName',$input['imagename']);
    }

        // $category = new Category;
        // if($request->hasFile('image'))
        // {
        //     //dd('helo');

        //    $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();           
        //     $filename = time().'.'.$ext;
        //     $file->move('asset/upload/categoryimage/',$filename);
            
        //     $category->image=$filename;
        // }
       
        //  $category->name=$request->input('name');
        // $category->slug= Str::slug($request->name);
        // $category->description=$request->input('description');
        // $category->meta_title=$request->input('meta_title');
        // $category->meta_description=$request->input('meta_description');
        // $category->meta_keyword=$request->input('meta_keyword');
        // $category->navbar_status=$request->navbar_status == true ? '1':'0';
        // $category->status=$request->status == true ? '1':'0';
        // $category->save();
       // return redirect('admin/category')->with('message','Category added Successfully');
    //}
        
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
        $category =  Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/categoryimage/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
           // dd($file);
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('asset/upload/categoryimage/',$filename);
            $category->image =$filename;
        }
        $category->name=$request->input('name');
        $category->slug= Str::slug($request->name);
        $category->description=$request->input('description');
        $category->meta_title=$request->input('meta_title');
        $category->meta_description=$request->input('meta_description');
        $category->meta_keyword=$request->input('meta_keyword');
        $category->navbar_status=$request->navbar_status == true ? '1':'0';
        $category->status=$request->status == true ? '1':'0';
        $category->save();
        return redirect('admin/category')->with('message','Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category')->with('message','Category Deleted Successfully');
    }
}
