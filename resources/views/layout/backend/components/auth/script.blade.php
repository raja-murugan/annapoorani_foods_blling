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



    var h = 1;
    //var productids = [];
        $('.selectproduct').on('click', function(e){

            e.preventDefault();

            var product_id = $(this).data('product_id');

           // $('#addedproduct' + product_id).attr('style', 'display:none').val('Added').attr('disabled', true);
            //if ($('#addedproduct' + product_id).attr("disabled", true)) {
             //   var selectproductid = $(this).data('product_id');


            //} else {
            //    var selectproductid = '';
           // }

            $('#addedproduct' + product_id).attr('style', 'display:none');
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

                        //console.log(response);
                        //$('.product-table').html('');
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
                            var product_div = $('.child' + response[i].product_id).val();
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
                                    });





            //productids.push(selectproductid);

            //console.log(selectproductid);





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
                                    });
                                }
                            }



function sessiontype(sessionid) {
console.log(sessionid);
$(".category_type li:first").addClass('active');

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
        var sales_type = $('#sales_type').val();
        var subtotal = $('#subtotal').val();
        var taxamount = $('#taxamount').val();
        var paymentmethod = $('input[name=paymentmethod]:checked').val();
        var totalamount = $('#totalamount').val();


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
                    url: '/zworktechnology/sales/storeSalesData',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        billno: billno,
                        date: date,
                        time: time,
                        sales_type: sales_type,
                        subtotal: subtotal,
                        taxamount: taxamount,
                        paymentmethod: paymentmethod,
                        totalamount: totalamount,
                        product_ids: product_ids,
                        product_quantity: product_quantity,
                        product_price: product_price,
                        total_price: total_price,
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
                        //    window.location= "http://127.0.0.1:8000/zworktechnology/sales/print/" + last_salesid;
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
                        $('#taxamount').val('');
                        $('input[name=paymentmethod]:checked').val('');
                        $('#totalamount').val('');
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




</script>
