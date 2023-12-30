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
{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
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


    // Client CKEditor
    ClassicEditor
    .create( document.querySelector( '#comment' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

    // Filter api: Render data (Bỏ qua: data có ảnh, ko display được)

    // var renderData = (array) => {
    //     let row = ' <option disable value="">Chọn</option>';
    //     array.forEach(element => {
    //         row += `<option data-id="${element.product_name}" value="${element.product_name}">${element.product_name}</option>`
    //     });
    //     console.log(row);
    //     document.getElementById('filter_body').innerHTML = row
    // }

    // Sort
    $("#sort").on("change",function(){
        var order = parseInt($(this).val());
        var orderType = $("#sort").find(':selected').data('name');
        if(!(orderType=="default")){
            Sort(order,orderType);
        }
    })

    function Sort(order,orderType){
        if(orderType=="price"){
            var selector = element => element.querySelector('.price-after').innerText;
        }
        if(orderType=="id"){
            var selector = element => element.querySelector('.recent').innerText;
        }
        var isNumeric = true;
        var elements = [...document.querySelectorAll('.feature-item')];
        var parentElement = elements[0].parentNode;
        var collator = new Intl.Collator(undefined, {numeric: isNumeric, sensitivity: 'base'});
        elements.sort((elementA, elementB) => {
        var [firstElement, secondElement] = order ? [elementB, elementA] : [elementA, elementB];
        var textOfFirstElement = selector(firstElement);
        var textOfSecondElement = selector(secondElement);
        return collator.compare(textOfFirstElement , textOfSecondElement)
        }).forEach(element => parentElement.appendChild(element));
    }

    // Filter api: All
    function FilterAll(){
        $.ajax({
            url: '{{ route('client.apiFilter.index')}}',
            method: "get",
            success: function (response) {
                $("#filter_body").html(response);;
            }
        });
    }

    FilterAll();

    $('#show-products').on('click',function(){
        $("#sort option[data-name=default]").attr('selected', 'selected');
        $("option:selected").removeAttr("selected");
        $('li').removeClass('highlighted');
        $(this).closest('div').addClass('hide');
        $('#min').val('');
        $('#max').val('');
        FilterAll();
    })
    

    // Filter api: Category
    $('.category_filter').on('click',function(){
        $('#show-btn').removeClass('hide');
        $("#sort option[data-name=default]").attr('selected', 'selected');
        $("option:selected").removeAttr("selected");
        $('li').removeClass('highlighted');
        $(this).parent('li').addClass('highlighted')
        $.ajax({
            url: '{{route("client.apiFilter.show")}}',
            method: "get",
            data: {
                "name":"category",
                "id": $(this).data('id')
            },
            success: function (response) {
               $("#filter_body").html(response);

            }
        });
    });

    // Filter api: Price
    $('#price_filter').on('click',function(){
        var min = $('#min').val();
        var max = $('#max').val();
        if(!(min=="" && max=="")){
            $('#show-btn').removeClass('hide');
            $('#show-product').css('display','block');
            $("#sort option[data-name=default]").attr('selected', 'selected');
            $("option:selected").removeAttr("selected");
            $('li').removeClass('highlighted');
            $.ajax({
                url: '{{route("client.apiFilter.show")}}',
                method: "get",
                data: {
                    "name":"price",
                    "min": min,
                    "max": max
                },
                success: function (response) {
                $("#filter_body").html(response);
                }
            });
        }else{
            toastr.error("Min or max need to be filled")
        }
    });
</script>

