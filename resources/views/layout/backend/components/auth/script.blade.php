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
                           // console.log(response['data']);
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
                           // console.log(response['data']);
                            if(response['data'] != null){
                                alert('Already Existed');
                                $('.employee_contactno').val('');
                            }
                        }
                    });
                }
            });


            $(".supplier_contactno").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('supplier.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                           // console.log(response['data']);
                            if(response['data'] != null){
                                alert('Already Existed');
                                $('.supplier_contactno').val('');
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
                           // console.log(response['data']);
                            if(response['data'] != null){
                                alert('Already Existed');
                                $('.product_name').val('');
                            }
                        }
                    });
                }
            });

            $(".purchase_product").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('purchase_product.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                           // console.log(response['data']);
                            if(response['data'] != null){
                                alert('Already Existed');
                                $('.purchase_product').val('');
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
                           // console.log(response);
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

    function suppliercheck()
    {
        var mobile = $('.supplier_contactno').val();

        if(mobile.length>10){
            $('.supplier_contactno').val('');

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



                $(document).ready(function() {
                    var sessionid = '1';
                    $.ajax({
                        type: 'get',
                        url: '/GetAutosearchProducts/',
                        data: {
                                _token: "{{ csrf_token() }}",
                                sessionid: sessionid,
                            },
                        dataType: 'json',
                        success: function (response) {
                            //console.log(response);
                            $('.select2PS').html('');

                            var $select = $(".select2PS").append(
                                $('<option>', {
                                    value: '0',
                                    text: 'Select Product...'
                                }));
                            $(".select2PS").append($select);


                            var output = response.length;
                            for (var i = 0; i < output; i++) {

                                //console.log(response[i].product_id);



                                $(".select2PS").append($('<option>', {
                                    value: response[i].product_id,
                                    text:  response[i].product_name + ' - ₹ ' + response[i].product_price,
                                }));
                            }
                        }
                    });


                   
                           // $("#select2PS").select2({
                            //    templateResult: formatOptions
                           // });
                            
                        

                }); 
               // function formatOptions (state) 
              //  {
             //           if (!state.id) { return state.text; }

                //        console.log(state.style);

                //        <!-- here i am creating a route of the images folder -->

               //         var $state = $(
                //                '<span ><img sytle="display: inline-block;" src="' + state.src + '"  /> ' + state.text + '</span>'
                //                );

                //            return $state;
                //}



    function sessiontype(sessionid) {
        console.log(sessionid);
        $('#purchase' + sessionid).each(function(){
            $(this).find('.category_type').first().addClass('active');
            var catogry_id = $(this).find('.category_type').first().data('cat_id');
            console.log(catogry_id);

                            $.ajax({
                                url: '/getselectedcat_products/',
                                type: 'get',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    catogry_id: catogry_id,
                                },
                                dataType: 'json',
                                success: function(response) {
                                    //console.log(response);
                                    $('.prodcttsdiv').html('');
                                    
                                    var len = response.length;
                                    for (var i = 0; i < len; i++) {
                                        var productsdiv = $('<div class="col-lg-3 col-sm-6 d-flex  ">' + 
                                                                '<div class="productset flex-fill">' +
                                                                    '<div class="productsetimg">' +
                                                                        '<img src="'+ response[i].product_image +'" alt="img">' +
                                                                    '</div>' +
                                                                    '<div class="productsetcontent">' +
                                                                        '<h4>'+ response[i].productname +'</h4>' +
                                                                        '<div style="display: flex">' +
                                                                            '<h6 class="pos-price">₹ '+ response[i].productprice +'.00</h6>' +
                                                                            '<h6><input type="button" name="add_to_cart" class="btn btn-scanner-set selectproduct addedproduct'+ response[i].id +'" data-product_id="'+ response[i].id +'" data-product_price="'+ response[i].productprice +'"id="addedproduct'+ response[i].id +'" style="background: #7367f0;font-size: 14px;font-weight: 700;color: #fff;"value="Add to cart" />' +
                                                                            '<input type="button" value="Add to cart" style="display:none;" class="btn btn-scanner-set clickquantity'+ response[i].id +'  rise_quantity" onClick="increment_quantity('+ response[i].id +')"> </h6>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>');
                                        $('.prodcttsdiv').append(productsdiv);
                                    }
                                }
                            });
            
        });

            $(document).on('click', '.category_type', function() {
            var catogry_id = $(this).data('cat_id');


                            $.ajax({
                                url: '/getselectedcat_products/',
                                type: 'get',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    catogry_id: catogry_id,
                                },
                                dataType: 'json',
                                success: function(response) {
                                   // console.log(response);
                                    $('.prodcttsdiv').html('');
                                    
                                    var len = response.length;
                                    for (var i = 0; i < len; i++) {
                                        var productsdiv = $('<div class="col-lg-3 col-sm-6 d-flex  ">' + 
                                                                '<div class="productset flex-fill">' +
                                                                    '<div class="productsetimg">' +
                                                                        '<img src="'+ response[i].product_image +'" alt="img">' +
                                                                    '</div>' +
                                                                    '<div class="productsetcontent">' +
                                                                        '<h4>'+ response[i].productname +'</h4>' +
                                                                        '<div style="display: flex">' +
                                                                            '<h6 class="pos-price">₹ '+ response[i].productprice +'.00</h6>' +
                                                                            '<h6><input type="button" name="add_to_cart" class="btn btn-scanner-set selectproduct addedproduct' + response[i].id + '" id="addedproduct' + response[i].id + '"  data-product_id="' + response[i].id + '" data-product_price="'+ response[i].productprice +'" value="Add to cart" />' +
                                                                            '<input type="button" value="Add to cart" style="display:none;" class="btn btn-scanner-set clickquantity' + response[i].id + '  rise_quantity" onClick="increment_quantity(' + response[i].id + ')"> </h6>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>');
                                        $('.prodcttsdiv').append(productsdiv);
                                        //$('#addedproduct' + response[i].id).attr('style', 'display:none');
                                       // $('.clickquantity' + response[i].id).attr('style', 'display:block');
                                    }
                                }
                            });

                            
                });


                $(document).ready(function() {
                    $.ajax({
                        type: 'get',
                        url: '/GetAutosearchProducts/',
                        data: {
                                _token: "{{ csrf_token() }}",
                                sessionid: sessionid,
                            },
                        dataType: 'json',
                        success: function (response) {
                            //console.log(response);
                            $('.select2PS').html('');

                            var $select = $(".select2PS").append(
                                $('<option>', {
                                    value: '0',
                                    text: 'Select Product...'
                                }));
                            $(".select2PS").append($select);


                            var output = response.length;
                            for (var i = 0; i < output; i++) {

                                //console.log(response[i].product_id);



                                $(".select2PS").append($('<option>', {
                                    value: response[i].product_id,
                                    text:  response[i].product_name + ' - ₹ ' + response[i].product_price,
                                }));
                            }
                        }
                    });



                       
                       


                }); 


    }

    var h = 1;
        $(document).on('click', '.selectproduct', function() {

                

            var product_id = $(this).data('product_id');
            
            console.log(product_id);
            $('.addedproduct' + product_id).attr('style', 'display:none');
            $('.clickquantity' + product_id).attr('style', 'display:block');
            var selectproductid = $(this).data('product_id');



                $.ajax({
                    url: '/getselectedproducts/',
                    type: 'get',
                    data: {
                        _token: "{{ csrf_token() }}",
                        selectproductid: selectproductid,
                    },
                    dataType: 'json',
                    success: function(response) {
                        var len = response.length;
                        occurs = {};

                        for (var i = 0; i < len; i++) {

                            var e = $('<ul class="product-lists" id="productlist">'+
                            '<li>' +
                            '<div class="productimg">' +
                            '<div class="productimgs"><img src=" ' + response[i].product_image +  ' "alt="img"></div>' +
                            '<div class="productcontet"><h4> ' + response[i].product_name +  ' <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"data-bs-target="#edit"><img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}"alt="img"></a></h4>' +
                            '<div class="productlinkset"><h5>'+ response[i].Category +'</h5></div><div class="increment-decrement">' +
                            '<div class="input-groups">' +
                            '<input type="hidden" class="li_productid" id="li_productid" name="product_id[]"  value="' + response[i].product_id + '"/>' +
                            '<input type="button" value="-" class="button-minus dec button"  onClick="decrement_quantity('+ response[i].product_id +')">' +
                            '<input type="text" name="product_quantity[]" value="1"class="quantity-field product_quanitity" id="product_quantity' + response[i].product_id + '">' +
                            '<input type="button" value="+" class="button-plus inc button " onClick="increment_quantity('+ response[i].product_id +')">' +
                            '</div>' +
                            '<input type="hidden" name="product_price[]" id="product_price' + response[i].product_id +  '"  value="' + response[i].product_price + '"/>' +
                            '</div></div></div>' +
                            '</li><li><div class="input-groups"><span class="totalprice' + response[i].product_id +  '">' + response[i].product_price +  '</span>' +
                            '<input type="hidden" name="total_price[]" class="total_price' + response[i].product_id +  '" value="' + response[i].product_price +  '"/></div></li>' +
                            '<li><a class="confirm-text" href="javascript:void(0);"><a class="confirm-text remove-tr"><img src="{{ asset('assets/backend/img/icons/delete-2.svg') }}"alt="img"></a></li></ul>');

                            $('.product-table').prepend(e);
                            var product_div = '1';
                            $('#product_quantity' + response[i].product_id).val(product_div);


                            var product_price = $('#product_price' + response[i].product_id).val();
                                var totalprice = product_price * product_div;
                                $('.totalprice' + response[i].product_id).text(totalprice);
                                $('.total_price' + response[i].product_id).val(totalprice);



                                var tot_expense_amount = 0;
                                $("input[name='total_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tot_expense_amount = Number(tot_expense_amount) +
                                            Number($(this).val());
                                            $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                            $('#subtotal').val(tot_expense_amount);
                                            $('#totalamount').val(tot_expense_amount);


                                            var sale_discount = $('#sale_discount').val();
                                            var payment = Number(tot_expense_amount) - Number(sale_discount);
                                            $('.grand_total').text(payment.toFixed(2));
                                            $('.grandtotal').val(payment.toFixed(2));
                                    });
                        }

                        $(".total_count").text($('.product-table').children('.product-lists').length);

                    }
                });
                var tot_expense_amount = 0;
                                $("input[name='total_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tot_expense_amount = Number(tot_expense_amount) +
                                            Number($(this).val());
                                            $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                            $('#subtotal').val(tot_expense_amount);
                                            $('#totalamount').val(tot_expense_amount);
                                            $('.grand_total').text('₹ ' + tot_expense_amount);
                                            $('.grandtotal').val(tot_expense_amount);
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
                                            $('#subtotal').val(tot_expense_amount);
                                            $('#totalamount').val(tot_expense_amount);

                                            var sale_discount = $('#sale_discount').val();
                                            var payment = Number(tot_expense_amount) - Number(sale_discount);
                                            $('.grand_total').text(payment.toFixed(2));
                                            $('.grandtotal').val(payment.toFixed(2));
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
                                            $('#subtotal').val(tot_expense_amount);
                                            $('#totalamount').val(tot_expense_amount);

                                            var sale_discount = $('#sale_discount').val();
                                            var payment = Number(tot_expense_amount) - Number(sale_discount);
                                            $('.grand_total').text(payment.toFixed(2));
                                            $('.grandtotal').val(payment.toFixed(2));
                                    });
                                }
                            }





var dt = new Date();
var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
$(".current_time").html(time);
$(".currenttime").val(time);

var today = new Date();
var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
$(".current_date").html(date);
$(".currentdate").val(date);


//function cashclick() {
  //  $('#cashpaymentmethod').val('Cash');
  //  $('#onlinepaymentmethod').val('');
  //  $(".cashmethod").attr('style', 'border-color:black;');
  //  $(".onlinemethod").attr('style', '');
//}
//function onlineclick() {
  //  $('#onlinepaymentmethod').val('Online');
 //   $('#cashpaymentmethod').val('');
 //   $(".onlinemethod").attr('style', 'border-color:black;');
 //   $(".cashmethod").attr('style', '');
//}


$(document).on('click', '.remove-tr', function() {
    var liProductid = $(this).parents('ul').find("#li_productid").val();

    console.log(liProductid);

    $('#addedproduct' + liProductid).attr('style', 'background-color:#7367f0;color: #fff;').val('Add to Cart').attr('disabled', false);
    $('.clickquantity' + liProductid).attr('style', 'display:none');
    $(this).parents('ul').remove();


    var tot_expense_amount = 0;
                                $("input[name='total_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tot_expense_amount = Number(tot_expense_amount) +
                                            Number($(this).val());
                                            $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                            $('#subtotal').val(tot_expense_amount);
                                            $('#totalamount').val(tot_expense_amount);

                                            var sale_discount = $('#sale_discount').val();
                                            var payment = Number(tot_expense_amount) - Number(sale_discount);
                                            $('.grand_total').text(payment.toFixed(2));
                                            $('.grandtotal').val(payment.toFixed(2));
                                    });
});
$(document).on('click', '.remove-ultr', function() {
    $('.product-table').empty('');
    $('.selectproduct').attr('style', 'background-color:#7367f0;color: #fff;').val('Add to Cart').attr('disabled', false);
    $('.clickquantity').attr('style', 'display:none');
});



$(document).ready(function(){

    
    $('#sales_store').submit(function(e){
        e.preventDefault();

        console.log($(this).serialize());

        var billno = $('#billno').val();
        var date = $('#date').val();
        var time = $('#time').val();
        var sales_type = $('input[name=sales_type]:checked').val();
        var customer_type = $('#customer_type').val();
        var customer_id = $('#customer_id').val();
        var subtotal = $('#subtotal').val();
        var taxamount = $('#taxamount').val();
        var paymentmethod = $('input[name=paymentmethod]:checked').val();
        var totalamount = $('#totalamount').val();
        var sale_discount = $('#sale_discount').val();
        var grandtotal = $('#grandtotal').val();

        var product_ids = $("input[name='product_id[]']")
                .map(function () {
                    return $(this).val();
                }).get();

        var product_quantity = $("input[name='product_quantity[]']")
                .map(function () {
                    return $(this).val();
                }).get();


        var product_price = $("input[name='product_price[]']")
                .map(function () {
                    return $(this).val();
                }).get();

        var total_price = $("input[name='total_price[]']")
                .map(function () {
                    return $(this).val();
                }).get();

        //console.log(subtotal);


                $.ajax({
                    url: "{{ route('sales.store.salesdata') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        billno: billno,
                        date: date,
                        time: time,
                        sales_type: sales_type,
                        customer_type: customer_type,
                        customer_id: customer_id,
                        subtotal: subtotal,
                        taxamount: taxamount,
                        paymentmethod: paymentmethod,
                        totalamount: totalamount,
                        product_ids: product_ids,
                        product_quantity: product_quantity,
                        product_price: product_price,
                        total_price: total_price,
                        sale_discount: sale_discount,
                        grandtotal: grandtotal,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        //alert('Bill Added').attr('style', 'background-color:yellow;');

                                    $('.alert-success').fadeIn().html(response.msg);
                            setTimeout(function() {
                                $('.alert-success').fadeOut("slow");
                            }, 2000 );

                            var last_salesid = response.last_id;
                            //window.location= "http://127.0.0.1:8000/zworktechnology/sales/print/" + last_salesid;
                            window.location= "https://allhighcare.com/zworktechnology/sales/print/" + last_salesid;
                           // window.location.close();



                           // var win=window.open("http://127.0.0.1:8000/zworktechnology/sales/print/" + last_salesid);
           //  with(win.document)
           //  {
            //    setTimeout(function() {
            //        win.document.close();
            //                }, 5);
            // }

                        document.getElementById("sales_store").reset();
                        $('.product-table').empty('');
                        $('.selectproduct').attr('style', 'background-color:#7367f0;color: #fff;').val('Add to Cart').attr('disabled', false);
                        $('.rise_quantity').attr('style', 'display:none');

                        $('#billno').val(response.next_billno);
                        $('.billno').text(response.next_billno);
                        $('.total_count').text('');
                        $('.subtotalamount').text('');
                        $('#subtotal').val('');
                        $('#customer_type').val('walkincustomer');
                        $('#customer_type').select2().trigger('change');
                        $('#customer_id').val('');
                        $('#taxamount').val('');
                        $('input[name=paymentmethod]:checked').val('');
                        $('#totalamount').val('');
                        $('#sale_discount').val('');
                        $('.grand_total').text('');
                        $('.grandtotal').val('');
                        $('.cutomer_arr').hide();
                        $('.customertyp').show();
                        $('.selectproduct').show();
                    }
                });
    });



});

function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }



            
            $('.select2PS').on('change', function () {
               // $('.productlist').fadeOut();
               
                var productid = $(this).find('option').filter(':selected').val()
                console.log(productid);
                $('option:selected', this).remove();

                $('.addedproduct' + productid).hide();
                        
                        var selectproductid = productid;


                        $.ajax({
                            url: '/getselectedproducts/',
                            type: 'get',
                            data: {
                                _token: "{{ csrf_token() }}",
                                selectproductid: selectproductid,
                            },
                            dataType: 'json',
                            success: function(response) {

                                //console.log(response);
                                //$(this).find('option').filter(':selected').val('');
                                
                                var len = response.length;
                                occurs = {};

                                for (var i = 0; i < len; i++) {

                                    var e = $('<ul class="product-lists" id="productlist">'+
                                    '<li>' +
                                    '<div class="productimg">' +
                                    '<div class="productimgs"><img src=" ' + response[i].product_image +  ' "alt="img"></div>' +
                                    '<div class="productcontet"><h4> ' + response[i].product_name +  ' <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"data-bs-target="#edit"><img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}"alt="img"></a></h4>' +
                                    '<div class="productlinkset"><h5>'+ response[i].Category +'</h5></div><div class="increment-decrement">' +
                                    '<div class="input-groups">' +
                                    '<input type="hidden" class="li_productid" id="li_productid" name="product_id[]"  value="' + response[i].product_id + '"/>' +
                                    '<input type="button" value="-" class="button-minus dec button"  onClick="decrement_quantity('+ response[i].product_id +')">' +
                                    '<input type="text" name="product_quantity[]" value="1"class="quantity-field product_quanitity" id="product_quantity' + response[i].product_id + '">' +
                                    '<input type="button" value="+" class="button-plus inc button " onClick="increment_quantity('+ response[i].product_id +')">' +
                                    '</div>' +
                                    '<input type="hidden" name="product_price[]" id="product_price' + response[i].product_id +  '"  value="' + response[i].product_price + '"/>' +
                                    '</div></div></div>' +
                                    '</li><li><div class="input-groups"><span class="totalprice' + response[i].product_id +  '">' + response[i].product_price +  '</span>' +
                                    '<input type="hidden" name="total_price[]" class="total_price' + response[i].product_id +  '" value="' + response[i].product_price +  '"/></div></li>' +
                                    '<li><a class="confirm-text" href="javascript:void(0);"><a class="confirm-text remove-tr"><img src="{{ asset('assets/backend/img/icons/delete-2.svg') }}"alt="img"></a></li></ul>');

                                    $('.product-table').prepend(e);
                                    //var product_div = $('.child' + response[i].product_id).val();
                                    var product_div = '1';
                                    $('#product_quantity' + response[i].product_id).val(product_div);


                                    var product_price = $('#product_price' + response[i].product_id).val();
                                        var totalprice = product_price * product_div;
                                        $('.totalprice' + response[i].product_id).text(totalprice);
                                        $('.total_price' + response[i].product_id).val(totalprice);



                                        var tot_expense_amount = 0;
                                        $("input[name='total_price[]']").each(
                                            function() {
                                                //alert($(this).val());
                                                tot_expense_amount = Number(tot_expense_amount) +
                                                    Number($(this).val());
                                                    $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                                    $('#subtotal').val(tot_expense_amount);
                                                    $('#totalamount').val(tot_expense_amount);
                                                     $('.grand_total').text('₹ ' + tot_expense_amount);
                                                    $('.grandtotal').val(tot_expense_amount);
                                            });
                                }

                                $(".total_count").text($('.product-table').children('.product-lists').length);

                            }
                        });




                                var tot_expense_amount = 0;
                                $("input[name='total_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tot_expense_amount = Number(tot_expense_amount) +
                                            Number($(this).val());
                                            $('.subtotalamount').text('₹ ' + tot_expense_amount);
                                            $('#subtotal').val(tot_expense_amount);
                                            $('#totalamount').val(tot_expense_amount);
                                            $('.grand_total').text('₹ ' + tot_expense_amount);
                                            $('.grandtotal').val(tot_expense_amount);
                                    });



                        
            });


        $(document).on("keyup", '.sale_discount', function() {
                var sale_discount = $(this).val();
                var totalamount = $("#totalamount").val();
                var payment = Number(totalamount) - Number(sale_discount);
                $('.grand_total').text(payment.toFixed(2));
                $('.grandtotal').val(payment.toFixed(2));
            });




            $(function(){

                $("input:radio[name='sales_type']").change(function(){
                    var _val = $(this).val();
                    console.log(_val);
                    if(_val == 'Dine In'){

                        $('#customer_type').val('walkincustomer');
                        $('#customer_type').select2().trigger('change');
                        $('.customertyp').show();
                        $('.cutomer_arr').hide();

                    }else if(_val == 'Take Away'){

                        $('#customer_type').val('walkoutcustomer');
                        $('#customer_type').select2().trigger('change');
                        $('.customertyp').show();
                        $('.cutomer_arr').hide();
                        

                    }else if(_val == 'Delivery'){
                        $('.customertyp').hide();
                        $('.cutomer_arr').show();
                        $('#customer_type').val('');

                    }
                });

            });




var j = 1;
var i = 1;


$(document).ready(function() {

    $(document).on('click', '.addproductfields', function() {
         ++i;
                $(".product_fields").append(
                    '<tr>' +
                    '<td style="background: #eee;"><input type="hidden"id="purchase_detail_id"name="purchase_detail_id[]" />' +
                    '<select class="form-control js-example-basic-single purchaseproduct_id select"name="purchaseproduct_id[]" id="purchaseproduct_id' + i + '"required>' +
                    '<option value="" selected hidden class="text-muted">Select Product</option></select>' +
                    '</td>' +
                    '<td style="background: #eee;"><input type="text" class="form-control quantity" id="quantity" name="quantity[]"placeholder="Quantity" value="" required /></td>' +
                    '<td style="background: #eee;"><input type="text" class="form-control price" id="price" name="price[]"placeholder="Price" value="" required /></td>' +
                    '<td style="background: #eee;"><input type="text" class="form-control total_price" id="total_price" name="total_price[]"placeholder="" value="" readonly /></td>' +
                    '<td style="background: #eee;"><button style="width: 35px;margin-right:5px;"class="py-1 text-white font-medium rounded-lg text-sm  text-center btn btn-primary addproductfields"type="button" id="" value="Add">+</button>' +
                    '<button style="width: 35px;" class="text-white py-1 font-medium rounded-lg text-sm  text-center btn btn-danger remove-purchasetr" type="button" >-</button></td>' +
                    '</tr>'
                );

                $.ajax({
                    url: '/getProducts/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
                        var len = response['data'].length;

                        var selectedValues = new Array();

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {

                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var option = "<option value='" + id + "'>" + name +
                                        "</option>";
                                    selectedValues.push(option);
                            }
                        }
                        ++j;
                        $('#purchaseproduct_id' + j).append(selectedValues);
                        //add_count.push(Object.keys(selectedValues).length);
                    }
                });
        });


});





$(document).on('click', '.remove-purchasetr', function() {
    $(this).parents('tr').remove();

        var sum = 0;
        $(".total_price").each(function(){
            sum += +$(this).val();
        });

        $(".sub_total").val(sum);
        $('.subtotal').text('₹ ' + sum);

        $('.total').val(sum);
        $('.totalamount').text('₹ ' + sum);

        $('.purchase_grandtotal').val(sum);
        $('.purchasegrand_total').text('₹ ' + sum);


        var tax = $( "#tax option:selected" ).val();
        if(tax != '0'){
            var sub_total = $(".sub_total").val();
            var tax_amount = (tax / 100) * sub_total;
            $('.tax_amount').val(tax_amount.toFixed(2));
            $('.taxamount').text('₹ ' + tax_amount.toFixed(2));

            var totsl = Number(sub_total) + Number(tax_amount);
            $('.total').val(totsl.toFixed(2));
            $('.totalamount').text('₹ ' + totsl.toFixed(2));

            var discount_price = $('.discount_price').val();

            var grand_total = Number(totsl) - Number(discount_price);
            $('.purchase_grandtotal').val(grand_total.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + grand_total.toFixed(2));
        }


        var discount_type = $("#discount_type").val();
        if(discount_type == 'fixed'){

            var discount = $('.discount').val();
            $('.discount_price').val(discount);
            $('.discountprice').text('₹ ' + discount);

            var total = $(".total").val();
            var total_amount = Number(total) - Number(discount);
            $('.purchase_grandtotal').val(total_amount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total_amount.toFixed(2));

        }else if(discount_type == 'percentage'){

            var total = $(".total").val();
            var discount = $('.discount').val();
            var discountPercentageAmount = (discount / 100) * total;
            $('.discount_price').val(discountPercentageAmount.toFixed(2));
            $('.discountprice').text('₹ ' + discountPercentageAmount.toFixed(2));

            var totalamount = Number(total) - Number(discountPercentageAmount);
            $('.purchase_grandtotal').val(totalamount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + totalamount.toFixed(2));

        }else if(discount_type == 'none'){

            $('.discount').val(0);
            $('.discount_price').val(0);
            $('.discountprice').text('₹ ' + 0);
            var total = $(".total").val();
            $('.purchase_grandtotal').val(total);
            $('.purchasegrand_total').text('₹ ' + total);
        }


        var paidamount = $('.paidamount').val();
        if(paidamount != ''){
            var purchase_grandtotal = $('.purchase_grandtotal').val();
            var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
            console.log(balance_amount);
            $('.balanceamount').val(balance_amount.toFixed(2));
        }
        

        


});




$(document).on("blur", "input[name*=quantity]", function() {
    var quantity = $(this).val();
    var price = $(this).parents('tr').find('.price').val();
    var total = quantity * price;
    $(this).parents('tr').find('.total_price').val(total);

        var sum = 0;
        $(".total_price").each(function(){
            sum += +$(this).val();
        });

        $(".sub_total").val(sum);
        $('.subtotal').text('₹ ' + sum);

        $('.total').val(sum);
        $('.totalamount').text('₹ ' + sum);

        $('.purchase_grandtotal').val(sum);
        $('.purchasegrand_total').text('₹ ' + sum);



        var tax = $( "#tax option:selected" ).val();
        if(tax != '0'){
            var sub_total = $(".sub_total").val();
            var tax_amount = (tax / 100) * sub_total;
            $('.tax_amount').val(tax_amount.toFixed(2));
            $('.taxamount').text('₹ ' + tax_amount.toFixed(2));

            var totsl = Number(sub_total) + Number(tax_amount);
            $('.total').val(totsl.toFixed(2));
            $('.totalamount').text('₹ ' + totsl.toFixed(2));

            var discount_price = $('.discount_price').val();

            var grand_total = Number(totsl) - Number(discount_price);
            $('.purchase_grandtotal').val(grand_total.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + grand_total.toFixed(2));
        }


        var discount_type = $("#discount_type").val();
        if(discount_type == 'fixed'){

            var discount = $('.discount').val();
            $('.discount_price').val(discount);
            $('.discountprice').text('₹ ' + discount);

            var total = $(".total").val();
            var total_amount = Number(total) - Number(discount);
            $('.purchase_grandtotal').val(total_amount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total_amount.toFixed(2));

        }else if(discount_type == 'percentage'){

            var total = $(".total").val();
            var discount = $('.discount').val();
            var discountPercentageAmount = (discount / 100) * total;
            $('.discount_price').val(discountPercentageAmount.toFixed(2));
            $('.discountprice').text('₹ ' + discountPercentageAmount.toFixed(2));

            var totalamount = Number(total) - Number(discountPercentageAmount);
            $('.purchase_grandtotal').val(totalamount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + totalamount.toFixed(2));

        }else if(discount_type == 'none'){

            $('.discount').val(0);
            $('.discount_price').val(0);
            $('.discountprice').text('₹ ' + 0);
            var total = $(".total").val();
            $('.purchase_grandtotal').val(total.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total.toFixed(2));
        }


        var paidamount = $('.paidamount').val();
        var purchase_grandtotal = $('.purchase_grandtotal').val();

        var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
        $('.balanceamount').val(balance_amount.toFixed(2));

    });





$(document).on("blur", "input[name*=price]", function() {
    var price = $(this).val();
    var quantity = $(this).parents('tr').find('.quantity').val();
    var total = quantity * price;
    $(this).parents('tr').find('.total_price').val(total);

        var sum = 0;
        $(".total_price").each(function(){
            sum += +$(this).val();
        });

        $(".sub_total").val(sum);
        $('.subtotal').text('₹ ' + sum);

        $('.total').val(sum);
        $('.totalamount').text('₹ ' + sum);

        $('.purchase_grandtotal').val(sum);
        $('.purchasegrand_total').text('₹ ' + sum);



        var tax = $( "#tax option:selected" ).val();
        if(tax != '0'){
            var sub_total = $(".sub_total").val();
            var tax_amount = (tax / 100) * sub_total;
            $('.tax_amount').val(tax_amount.toFixed(2));
            $('.taxamount').text('₹ ' + tax_amount.toFixed(2));

            var totsl = Number(sub_total) + Number(tax_amount);
            $('.total').val(totsl.toFixed(2));
            $('.totalamount').text('₹ ' + totsl.toFixed(2));

            var discount_price = $('.discount_price').val();

            var grand_total = Number(totsl) - Number(discount_price);
            $('.purchase_grandtotal').val(grand_total.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + grand_total.toFixed(2));
        }


        var discount_type = $("#discount_type").val();
        if(discount_type == 'fixed'){

            var discount = $('.discount').val();
            $('.discount_price').val(discount);
            $('.discountprice').text('₹ ' + discount);

            var total = $(".total").val();
            var total_amount = Number(total) - Number(discount);
            $('.purchase_grandtotal').val(total_amount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total_amount.toFixed(2));

        }else if(discount_type == 'percentage'){

            var total = $(".total").val();
            var discount = $('.discount').val();
            var discountPercentageAmount = (discount / 100) * total;
            $('.discount_price').val(discountPercentageAmount.toFixed(2));
            $('.discountprice').text('₹ ' + discountPercentageAmount.toFixed(2));

            var totalamount = Number(total) - Number(discountPercentageAmount);
            $('.purchase_grandtotal').val(totalamount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + totalamount.toFixed(2));

        }else if(discount_type == 'none'){

            $('.discount').val(0);
            $('.discount_price').val(0);
            $('.discountprice').text('₹ ' + 0);
            var total = $(".total").val();
            $('.purchase_grandtotal').val(total.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total.toFixed(2));
        }

        var paidamount = $('.paidamount').val();
        var purchase_grandtotal = $('.purchase_grandtotal').val();

        var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
        $('.balanceamount').val(balance_amount.toFixed(2));


});




$("#tax").on('change', function() {
    var tax = $(this).val();
    var sub_total = $(".sub_total").val();
    var tax_amount = (tax / 100) * sub_total;
    $('.tax_amount').val(tax_amount.toFixed(2));
    $('.taxamount').text('₹ ' + tax_amount.toFixed(2));

    var totsl = Number(sub_total) + Number(tax_amount);
    $('.total').val(totsl.toFixed(2));
    $('.totalamount').text('₹ ' + totsl.toFixed(2));

    var discount_price = $('.discount_price').val();
    var grand_total = Number(totsl) - Number(discount_price);
    $('.purchase_grandtotal').val(grand_total.toFixed(2));
    $('.purchasegrand_total').text('₹ ' + grand_total.toFixed(2));

    var paidamount = $('.paidamount').val();
    var purchase_grandtotal = $('.purchase_grandtotal').val();

    var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
    $('.balanceamount').val(balance_amount.toFixed(2));
});



$("#discount_type").on('change', function() {
        var discount_type = this.value;
        
        if(discount_type == 'fixed'){

            $('#discount').val('');
            $('.discount_price').val(0);
            $('.discountprice').text('₹ ' + 0);

        }else if(discount_type == 'percentage'){

            $('#discount').val('');
            $('.discount_price').val(0);
            $('.discountprice').text('₹ ' + 0);

        }else if(discount_type == 'none'){

            $('#discount').val('');
            $('.discount_price').val(0);
            $('.discountprice').text('₹ ' + 0);

            var total = $(".total").val();
            $('.purchase_grandtotal').val(total.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total.toFixed(2));

            var paidamount = $('.paidamount').val();
            var purchase_grandtotal = $('.purchase_grandtotal').val();
            var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
            $('.balanceamount').val(balance_amount.toFixed(2));
        }
    });


    $(document).on("keyup", 'input.discount', function() {
        var discount = $(this).val();
        var discount_type = $("#discount_type").val();

        if(discount_type == 'fixed'){

            $('.discount_price').val(discount);
            $('.discountprice').text('₹ ' + discount);

            var total = $(".total").val();
            var total_amount = Number(total) - Number(discount);
            $('.purchase_grandtotal').val(total_amount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total_amount.toFixed(2));

            var paidamount = $('.paidamount').val();
            var purchase_grandtotal = $('.purchase_grandtotal').val();
            var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
            $('.balanceamount').val(balance_amount.toFixed(2));

        }else if(discount_type == 'percentage'){

            var total = $(".total").val();
            var discountPercentageAmount = (discount / 100) * total;
            $('.discount_price').val(discountPercentageAmount.toFixed(2));
            $('.discountprice').text('₹ ' + discountPercentageAmount.toFixed(2));

            var totalamount = Number(total) - Number(discountPercentageAmount);
            $('.purchase_grandtotal').val(totalamount.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + totalamount.toFixed(2));

            var paidamount = $('.paidamount').val();
            var purchase_grandtotal = $('.purchase_grandtotal').val();
            var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
            $('.balanceamount').val(balance_amount.toFixed(2));

        }else if(discount_type == 'none'){

            $('.discount').val(0);
            $('.discount_price').val(0);
            $('.discountprice').text('₹ ' + 0);
            var total = $(".total").val();
            $('.purchase_grandtotal').val(total.toFixed(2));
            $('.purchasegrand_total').text('₹ ' + total.toFixed(2));

            var paidamount = $('.paidamount').val();
            var purchase_grandtotal = $('.purchase_grandtotal').val();
            var balance_amount = Number(purchase_grandtotal) - Number(paidamount);
            $('.balanceamount').val(balance_amount.toFixed(2));
        }
    });


    $(document).on("keyup", 'input.paidamount', function() {
        var paidamount = $(this).val();
        var purchase_grandtotal = $(".purchase_grandtotal").val();
        //alert(bill_paid_amount);
        var purchase_balance_amount = Number(purchase_grandtotal) - Number(paidamount);
        $('.balanceamount').val(purchase_balance_amount.toFixed(2));
    });


    $(document).on("keyup", 'input.paidamount', function() {
            var payable_amount = $(this).val();
            var grand_total = $(".purchase_grandtotal").val();

            if (Number(payable_amount) > Number(grand_total)) {
                alert('!Paid Amount is More than of Total!');
                $(".paidamount").val('');
            }
    });


function purchasesubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
            
</script>
