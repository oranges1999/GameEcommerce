<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  {{-- css --}}
  @include('admin.layouts.css')
 
</head>
<body class="login-form-body">
    <div class="login-form">
        <div class="back login">
            <div class="div-center">
                <div class="content">
                    <div class="d-flex justify-content-center">
                        <h3>Login</h3>
                    </div>
                    <form action="{{route("admin.plogin")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@include('admin.layouts.js')
</html>
