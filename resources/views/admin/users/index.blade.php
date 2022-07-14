@extends('admin.layout.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
    <div class="card-header">
            <h2>Users</h2>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <table id="mydatatable" class="table table-bordered">
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $finals)
                    <tr >
                        <td>{{$finals->id}}</td>
                        <td>{{$finals->name}}</td>
                        <td>{{$finals->email}}</td>
                        <td>{{$finals->role_as =='1' ? 'admin':'user'}}</td>
                        <td ><a href="{{url('admin/edit-user/'.$finals->id)}}" class="btn btn-success">Edit</a>
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