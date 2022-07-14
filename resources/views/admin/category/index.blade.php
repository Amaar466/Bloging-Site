@extends('admin.layout.admin')
@section('content')


<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
    <div class=" d-md-flex justify-content-md-end">
  <button class="btn btn-primary me-md-2 " type="button"><a href="{{url('admin/add-category')}}" class="text-white ">Add category</a></button>
  
</div>
        <h4>View Category</h4>
    </div>
    <div class="card-body">

    @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <table id="mydatatable" class="table table-bordered ">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th >Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th >Action</th>
      
                    </tr>
                </thead>
                <tbody> 
                    @foreach($category as $finals)
                    <tr >
                        <td>{{$finals->id}}</td>
                        <td>{{$finals->name}}</td>
                        <td>
                        <img src="{{asset('asset/upload/categoryimage/'.$finals->image)}}" style="width:50px;height:50px;">
                        </td>
                        <td>{{$finals->status =='1' ? 'hidden':'shown'}}</td>
                        <td><a href="{{url('admin/edit-category/'.$finals->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{url('admin/delete-category/'.$finals->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>


</div>
@endsection