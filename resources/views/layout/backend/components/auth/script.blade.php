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




    var productids = [];  
        $('.selectproduct').on('click', function(e){
            
            e.preventDefault();    
            product_id = $(this).data('product_id');
            $('#addedproduct' + product_id).attr('style', 'background-color:#751818;border-color:black;color:white;').val('Added').attr('disabled', true);
            if ($('#addedproduct' + product_id).attr("disabled", true)) {
                var selectproductid = $(this).data('product_id');
            } else {
                var selectproductid = '';
            }
            productids.push(selectproductid);

            console.log(productids); 

            

                $.ajax({
                    url: '/getselectedproducts/',
                    type: 'get',
                    data: {
                        _token: "{{ csrf_token() }}",
                        productids: productids,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        $('.product-table').html('');
                        var len = response.length;

                        $('.total_count').html(len);
                        for (var i = 0; i < len; i++) {
                            var e = $('<ul class="product-lists">'+
                            '<li>' +
                            '<div class="productimg">' +
                            '<div class="productimgs"><img src=" ' + response[i].product_image +  ' "alt="img"></div>' +
                            '<div class="productcontet"><h4> ' + response[i].product_name +  ' <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"data-bs-target="#edit"><img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}"alt="img"></a></h4>' + 
                            '<div class="increment-decrement">' +
                            '<div class="input-groups">' +
                            '<input type="button" value="-" class="button-minus dec button"  onClick="decrement_quantity('+ response[i].product_id +')">' +
                            '<input type="text" name="child" value="1"class="quantity-field product_quanitity" id="product_quantity' + response[i].product_id +  '">' +
                            '<input type="button" value="+" class="button-plus inc button " onClick="increment_quantity('+ response[i].product_id +')">' +
                            '</div>' +
                            '<input type="hidden" name="product_price" id="product_price' + response[i].product_id +  '"  value="' + response[i].product_price + '"/>' +
                            '</div></div></div>' +
                            '</li><li><div class="input-groups"><span class="totalprice' + response[i].product_id +  '">' + response[i].product_price +  '</span>' +
                            '<input type="hidden" name="total_price[]" class="total_price' + response[i].product_id +  '" value="' + response[i].product_price +  '"/></div></li>' +
                            '<li><a class="confirm-text" href="javascript:void(0);"><a class="confirm-text" href="javascript:void(0);"><img src="{{ asset('assets/backend/img/icons/delete-2.svg') }}"alt="img"></a></li></ul>');

                            $('.product-table').append(e); 


                            
                        }
                        


                    }
                });




                var tot_expense_amount = 0;
                                $("input[name='total_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tot_expense_amount = Number(tot_expense_amount) +
                                            Number($(this).val());
                                            $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                    });

                
        });

                            function increment_quantity(productid) {

                                var inputQuantityElement = $('#product_quantity' + productid);
                                console.log(inputQuantityElement);
                                var newQuantity = parseInt($(inputQuantityElement).val())+1;
                                var QuantityElement = $('#product_quantity' + productid);
                                $(inputQuantityElement).val(newQuantity);

                                var product_price = $('#product_price' + productid).val();
                                var totalprice = product_price * newQuantity;
                                $('.totalprice' + productid).text(totalprice);
                                $('.total_price' + productid).val(totalprice);



                                var tot_expense_amount = 0;
                                $("input[name='total_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tot_expense_amount = Number(tot_expense_amount) +
                                            Number($(this).val());
                                            $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                    });
                            }

                            function decrement_quantity(productid) {
                                var inputQuantityElement = $('#product_quantity' + productid);
                                if($(inputQuantityElement).val() > 1) 
                                {
                                var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
                                $(inputQuantityElement).val(newQuantity);

                                var product_price = $('#product_price' + productid).val();
                                var totalprice = product_price * newQuantity;
                                $('.totalprice' + productid).text(totalprice);
                                $('.total_price' + productid).val(totalprice);

                                var tot_expense_amount = 0;
                                $("input[name='total_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tot_expense_amount = Number(tot_expense_amount) +
                                            Number($(this).val());
                                            $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                    });
                                }
                            }

                            
        
</script>
