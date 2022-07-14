@extends('layouts.app')

@section('title',"$category->meta_title")

@section('meta_description',"$category->meta_description")

@section('meta_keyword',"$category->meta_keyword")

@section('content')

<div class="py-5">
    <div class="container">
     <div class="row">
        <div class="col-md-9">
            <div class="category-heading">
                <h4>{{$category->name}}</h4>
            </div>
            @forelse($post as $postitem)
            <div class="card card-shadow mt-4">
                <div class="card-body">
                    <a href="{{url('tutorial/'.$category->slug.'/'.$postitem->slug)}}" class="text-decoration-none">
                    <h2 class="post-heading">{{$postitem->name}}</h2>
                    </a>
                    <h6>Post no:{{$postitem->created_at->format('d-m-y')}}
                        <span class="ms-3">Post By:{{$postitem->user->name}}</span>
                    </h6>                    
                </div>
            </div>
           
            @empty
            <div class="col-md-3">
            <div class="border">
            <h4 class="mt-3">No Post are available</h4>
            </div>
           @endforelse
           <div class="your-paginate mt-2">
                {{$post->links()}}
            </div>
        </div>
        </div>
       
     </div>
    </div>
</div>
@endsection
