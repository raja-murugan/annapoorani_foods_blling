<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script src="{{ asset('assets/backend/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/feather.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/apexchart/chart-data.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/sweetalert/sweetalerts.min.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/toastr/toastr.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="{{ asset('assets/backend/js/script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

            $(".customer_contactno").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('customer.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response['data']);
                            if(response['data'] != null){
                                alert('Already Existed');
                                $('.customer_contactno').val('');
                            }
                        }
                    });
                }
            });


            $(".employee_contactno").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('employee.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response['data']);
                            if(response['data'] != null){
                                alert('Already Existed');
                                $('.employee_contactno').val('');
                            }
                        }
                    });
                }
            });


            $(".product_name").keyup(function() {
                var query = $(this).val();
                var productsession_id = $(".productsession_id").val();
                var productcategory_id = $(".productcategory_id").val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('product.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query,
                            productsession_id: productsession_id,
                            productcategory_id: productcategory_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response['data']);
                            if(response['data'] != null){
                                alert('Already Existed');
                                $('.product_name').val('');
                            }
                        }
                    });
                }
            });


            $('.productsession_id').on('change', function() {
                var productsession_id = this.value;
                    $.ajax({
                        url: '/getcategories/',
                        type: 'get',
                        data: {
                            _token: "{{ csrf_token() }}",
                            productsession_id: productsession_id,
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            var len = response.length;
                            $('.productcategory_id').empty();

                            var $select = $(".productcategory_id").append(
                                $('<option>', {
                                    value: '0',
                                    text: 'Select'
                                }));
                            $(".productcategory_id").append($select);

                            for (var i = 0; i < len; i++) {
                                $(".productcategory_id").append($('<option>', {
                                    value: response[i].id,
                                    text: response[i].name
                                }));
                            }

                        }
                    });
            });


    });

    function customercheck()
    {
        var mobile = $('.customer_contactno').val();

        if(mobile.length>10){
            $('.customer_contactno').val('');

        }
    }

    function employeecheck()
    {
        var mobile = $('.employee_contactno').val();

        if(mobile.length>10){
            $('.employee_contactno').val('');

        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#productimage").change(function(){
        readURL(this);
    });




    $(document).ready(function(){

        $(document).on('click', '.select_product', function(){
            var product_id = $(this).data('product_id');
            //console.log(product_id);
            if($(this).prop('checked') == true)
            {
            $('#product_'+product_id).css('background-color', '#97a2d236');
            }
            else
            {
            $('#product_'+product_id).css('background-color', 'transparent');
            }
        });


        
        $('#add_to_cart').click(function(){
            var product_id = [];
            var product_name = [];
            var product_price = [];
            var action = "add";
                $('.select_product').each(function(){
                if($(this).prop('checked') == true)
                {

                    product_id.push($(this).data('product_id'));
                    product_name.push($(this).data('product_name'));
                    product_price.push($(this).data('product_price'));
                }
                });

                if(product_id.length > 0)
                {
                    //console.log(product_id);

                    $.ajax({
                        url: '/getselectedproducts/',
                        type: 'get',
                        data: {
                            _token: "{{ csrf_token() }}",
                            product_id: product_id,
                            product_name: product_name,
                            product_price: product_price,
                            action: action,
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);

                                $('.select_product').each(function(){
                                    if($(this).prop('checked') == true)
                                    {
                                        $(this).prop('checked', false);
                                        var temp_product_id = $(this).data('product_id');
                                        $('#product_'+temp_product_id).css('background-color', 'transparent');
                                        $('#product_'+temp_product_id).css('border-color', '#ccc');
                                    }
                                });


                                

                            alert("Item has been Added into Cart");

                        }
                    });
                }

        });

        
    });
</script>
