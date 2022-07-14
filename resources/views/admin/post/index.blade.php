@extends('admin.layout.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <div class=" d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2 " type="button"><a href="{{url('admin/add-post')}}" class="text-white ">Add Post</a></button>

            </div>
            <h4>View Post</h4>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <table id="mydatatable" class="table table-bordered">
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($post as $finals)
                    <tr >
                        <td>{{$finals->id}}</td>
                       <td>{{$finals->Category->name}}</td>
                        <td>{{$finals->name}}</td>
                        <td>{{$finals->status =='1' ? 'hidden':'visible'}}</td>
                        <td class="text-center"><a href="{{url('admin/edit-post/'.$finals->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('admin/delete-post/'.$finals->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection