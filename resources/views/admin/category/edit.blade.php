@extends('admin.layout.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h1 class=""> Add Category</h1>
        
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control"  value="{{$category->name}}"/>
                </div>
                <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{$category->slug}}" />
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" id="mySummernote" rows="5" class="form-control">{{$category->description}}</textarea>
                </div>
                <img src="{{asset('asset/upload/categoryimage/'.$category->image)}}" style="width: 100px;">

                <div class="mb-3">
                    <label>Image</label>
                <input type="file" name="image" class="form-control" />
                </div>
                <h6>SEO tags</h6>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{$category->meta_description}}</textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{$category->meta_keyword}}</textarea>
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                    <div class=" col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status" value="{{$category->navbar_status}}" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" value="{{$category->status}}"/>
                    </div>
                    <div class="col-md-6 mt-3">
                        <button type="submit" class="float-right btn btn-primary">update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection