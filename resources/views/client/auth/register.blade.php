@extends('client.frame')
@section('content')
<form action="{{route("pRegister")}}" method="POST">
    @csrf
    <div class="container col-md-5 justify-content-center">
        <div class="form-group">
            <label class="text-light" for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
              <label class="text-light" for="exampleInputName1">Name</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
            </div>
          <div class="form-group">
            <label class="text-light" for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection