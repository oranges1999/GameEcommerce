@extends('admin.home')
@section('content')
{{-- @dd($categories->all()) --}}
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Comments</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Comments</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div>
    <table border="1" class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Product name</th>
              <th>Product Image</th>
              <th>Product Rating</th>
              <th>Comment</th>
              <th>Status</th>
              <th colspan="2">Timestamp</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $key => $comment)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$comment->client->name}}</td>
                    <td>{{$comment->client->email}}</td>
                    <td>{{$comment->client->phone}}</td>
                    <td>{{$comment->product->product_name}}</td>
                    <td>
                        <img width="100px" src="{{asset(str_replace("public","storage",$comment->product->product_img_url))}}" alt="">
                    </td>
                    <td>
                        @if($comment->score==5)
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        @endif
                        @if($comment->score==4)
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-regular fa-star"></i>
                        @endif
                        @if($comment->score==3)
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        @endif
                        @if($comment->score==2)
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        @endif
                        @if($comment->score==1)
                        <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        @endif
                    </td>
                    <td>{!!$comment->comment!!}</td>
                    <td>
                        @if($comment->status==0)
                        <h5 style="color: red">Hidden</h5>
                        @endif
                        @if($comment->status==1)
                        <h5 style="color: blue">Display</h5>
                        @endif
                    </td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->updated_at}}</td>
                    <td>
                        @if($comment->status==0)
                        <form action="{{route("admin.comments.update",$comment->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button name="display" class="btn btn-primary">Display</button>
                        </form>                        
                        @endif
                        @if($comment->status==1)
                        <form action="{{route("admin.comments.update",$comment->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="id" value="{{$comment->id}}" hidden>
                            <button name="hidden" class="btn btn-danger">Hidden</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
  {!! $comments->links() !!}
</div>
@endsection