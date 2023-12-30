
@extends('admin.home')

@section('content')
{{-- @dd($admin->all()) --}}
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Logistics</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Logistics</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<a href="{{route("admin.logistic.create")}}"><button class="btn btn-primary">Import products</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>          
      <th scope="col">Admin</th>
      <th scope="col">Note</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th colspan="2" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($logistics as $key=>$logistic)
      <tr>
        <td scope="row">{{++$key}}</td>
        <td>{{$logistic->admin->name}}</td>
        <td>{{$logistic->note}}</td>
        <td>{{$logistic->created_at}}</td>
        <td>{{$logistic->updated_at}}</td>
        <td>
          <a href="{{route("admin.logistic.show",$logistic->id)}}"><button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></a>
        </td>
        <td>
          <form action="{{route("admin.logistic.destroy",$logistic->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
  {!! $logistics->links() !!}
</div>
@endsection