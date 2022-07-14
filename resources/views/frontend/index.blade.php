@extends('layouts.app')

@section('title')

Blogging

@endsection


@section('content')

<div class="bg-danger py-5">
    <div class="container">


        <div class="row">
            <div class="col-md-12 mt-5">

                <div class="owl-carousel owl-theme">
                    @foreach($all_category as $finals)
                    <div class="item">
                        <a href="{{url('tutorial/'.$finals->slug)}}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{asset('asset/upload/categoryimage/'.$finals->image)}}" alt="">
                                <div class="card-body">
                                    <h4 class="text-dark">{{$finals->name}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-gray">
    <div class="container">
        <div class="border text-center py-3">
            <h3>Advertise here</h3>
        </div>
    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Blog</h4>
                <div class="underline"></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad dicta, odit assumenda itaque recusandae hic labore, repellat, asperiores minus fugit eius! Debitis perspiciatis sed eos nam, dolor neque dolorum!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quidem, aut, doloribus commodi dolor debitis maiores quos eos non deserunt explicabo rem mollitia minus laboriosam sed cum iusto corrupti maxime?</p>

            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
                <div class="underline"></div>

            </div>
            @foreach($all_category as $finals)
            <div class="col-md-3">
                <div class="card card-body mb-3">
                    <a href="{{url('tutorial/'.$finals->slug)}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{$finals->name}}</h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Post </h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach($all_post as $finals)

                <div class="card card-body bg-gray shadow mb-3">
                    <a href="{{url('tutorial/'.$finals->category->slug. '/' .$finals->slug)}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{$finals->name}}</h5>
                    </a>
                    <h6 class="mt-1">Posted no: {{$finals->created_at->format('d-m-y')}}</h6>
                </div>

                @endforeach
            </div>
            <div class="col-md-4">
               
                        <div class="border text-center py-3">
                            <h3>Advertise here</h3>
                        </div>
                    
            </div>

        </div>
    </div>
</div>





@endsection