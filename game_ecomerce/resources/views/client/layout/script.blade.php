<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('asset/jscript.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- Toastr CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- Axios --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
{{-- Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // Toastr
    toastr.options = {
      "closeButton": true,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success
    @if(session()->has('success'))
    toastr.success("{{ session()->get('success') }}")
    @endif
    
    @if(session()->has('error'))
    toastr.error("{{ session()->get('error') }}")
    @endif

    // Live search
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    $('#search').on('keyup',function(){
        $value = $(this).val();
        if($value != ""){
            $.ajax({
            type: 'get',
            url: '{{route("search.search")}}',
            data: { 'search': $value },
            success:function(data){
                $('#search-box').html(data);
            }
            });
        }else{
            $('#search-box').html("")
        }
    })
    
    // Update cart
    $(".update-cart").change(function (e) {
        e.preventDefault();
        console.log(this);
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('client.cart.update') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: $(this).attr('name'), 
                buyQty: $(this).val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    // Vietnam provinces
    // const host = "https://provinces.open-api.vn/api/";
    // var callAPI = (api) => {
    //     return axios.get(api)
    //         .then((response) => {
    //             renderData(response.data, "city");
    //         });
    // }
    // callAPI('https://provinces.open-api.vn/api/?depth=1')
    // var callApiDistrict = (api) => {
    //     return axios.get(api)
    //         .then((response) => {
    //             renderData(response.data.districts, "district");
    //         });
    // }
    // var callApiWard = (api) => {
    //     return axios.get(api)
    //         .then((response) => {
    //             renderData(response.data.wards, "ward");
    //         });
    // }
    
    // var renderData = (array, select) => {
    //     let row = '';
    //     array.forEach(element => {
    //         row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
    //     });
    //     document.querySelector("#" + select).innerHTML = row
    // }

    // $("#city").change(() => {
    //     callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
    // });
    // $("#district").change(() => {
    //     callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
    // });

    $("#city").on("change",function(){
        $.ajax({
            url: '{{ route('province.district')}}',
            method: "get",
            data: {"city":$("#city").find(':selected').data('id')},
            success: function (response) {
               $("#district").html(response);
            }
        });
    })

    $("#district").on("change",function(){
        $.ajax({
            url: '{{ route('province.ward')}}',
            method: "get",
            data: {"district":$("#district").find(':selected').data('id')},
            success: function (response) {
               $("#ward").html(response);
            }
        });
    })

    // Select2

    // $(document).ready(function() {
    //     $('.js-example-basic-single').select2();
    // });
</script>

