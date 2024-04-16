
@extends('admin.home')

@section('content')
{{-- @dd($admin->all()) --}}
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Admin</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Admin</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<a href="{{route("admin.admin.create")}}"><button class="btn btn-primary">Create an Admin</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>      
      <th scope="col">Avatar</th>      
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th colspan="2" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($admin as $key => $value)
      <tr>
        <td scope="row">{{++$key}}</td>
        <td><img width="100px" src="{{asset(str_replace("public","storage",$value->avatar))}}" alt=""></td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->created_at}}</td>
        <td>{{$value->updated_at}}</td>
        <td>
          <a href="{{route("admin.admin.edit",$value->id)}}"><button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></a>
        </td>
        @if(!($value->id==1))
        <td>
          <form action="{{route("admin.admin.destroy",$value->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>
@endsection