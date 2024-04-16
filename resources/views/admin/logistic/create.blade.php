
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
<form action="{{ route("admin.logistic.store") }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Note</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter note" name="note">
    </div>
    <div class="form-group">
        <label for="products">Products</label>
        <div id="products">
            <select name="product_id" id="product-select">
              <option id="default" name="" value="">Select a product</option>
              @foreach($products as $product)
                <option id = "{{$product->id}}" value="{{$product->id}}">{{$product->product_name}}</option>
              @endforeach
            </select>
            <button type="button" class="add-pro btn btn-primary">Add Products</button>
            <br>
            <table class="table">
              <thead>
                <th scope="col">Product Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Action</th>
              </thead>
              <tbody id="product-field">
              </tbody>
            </table>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
@section('script')
<script>
$(".add-pro").on("click",function(){
  var Name = $("#product-select").find(":selected").text();
  var Key = $("#product-select").find(":selected").val()
  if(Key==""){
    toastr.error("Product need to be selected !")
  }else{
    $("#product-select").find(":selected").hide();
    var Content = '<tr><td>'+Name+'</td><td><input name="product['+Key+']" type="number" required></td><td><button data-id="'+Key+'" type="button" class="del-pro btn btn-danger"><i class="fa-solid fa-trash"></i></button></td></tr>';
    $("#product-field").append(Content);
  }
  $("#default").attr('selected', 'selected');
  $("option:selected").removeAttr("selected");
})

$('body').on('click', '.del-pro', function () {
  var id = $(this).data("id");
  $("#" + id).show();
  $(this).closest("tr").remove();
})

</script>
@endsection