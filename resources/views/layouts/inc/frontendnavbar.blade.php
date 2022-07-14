<div class="global-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('asset/images/logo.jpg')}}" class="w-25" alt="logo">
            </div>
            <div class="col-md-9">
              <div class="border p-2 text-center">
              <h5>Advertise here</h5>
              </div>
                
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-green">
  <div class="container">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
   
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
       
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
       @php 
         $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
       
         @endphp
      
       @foreach($categories as $finals)
        <li class="nav-item">
          <a class="nav-link" href="{{url('tutorial/'.$finals->slug)}}">{{$finals->name}}</a>
        </li>
        @endforeach
      </ul>
      
    </div>
  </div>
</nav>