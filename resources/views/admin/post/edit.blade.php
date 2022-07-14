@extends('admin.layout.admin')
@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
   
        <h4>Edit Post</h4>
    </div>
    <div class="card-body">
        <form action="{{url('admin/update-post/'.$post->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control">
                @foreach($category as $finals)
                    <option value="{{$finals->id}}">{{$finals->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Post Nmae</label>
               <input type="text" name="name" class="form-control" value="{{$post->name}}" />
            </div>
            <div class="mb-3">
                <label>Post Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$post->slug}}" />
            </div>
            <div class="mb-3">
                <label>Description</label>
               <textarea name="description" id="mySummernote" rows="5" class="form-control">{{$post->description}}</textarea>
            </div>
            <div class="mb-3">
                <label>Yout Iframe Link</label>
                <input type="text" name="yt_iframe" class="form-control" value="{{$post->yt_iframe}}" />
            </div>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{$post->meta_title}}" />
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
               <textarea name="meta_description" rows="3" class="form-control">{{$post->meta_description}}</textarea>
            </div>
            <div class="mb-3">
                    <label>Meta Keyword</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{$post->meta_keyword}}</textarea>
                </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" value="{{$post->status}}" />
                    </div>
                </div>
                <div class="col-md-8 mt-3">
                        <button type="submit" class="float-right btn btn-primary">Update Post</button>
                    </div>
            </div>
        </form>
    </div>
</div>
</div>

        @endsection