<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="purchaseorderviewLargeModalLabel{{ $datas['unique_key'] }}">Purchase Details</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">



        <div class="card">
            <div class="card-body">
               <div style="padding-bottom: 25px;">
               <h6 >Bill No : #<span style="font-weight:700;">{{ $datas['bill_no'] }}</span></h6>

            </div>
         <div class="invoice-box table-height" style="max-width: 1600px;width:100%;overflow: auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">
               <div class="row">

                  <div class="col-lg-6 col-sm-6 col-12">
                     <div class="card">
                        <div class="card-body">
                        <span  class=""><font style="vertical-align: inherit;margin-bottom:25px;vertical-align: inherit;font-size:16px;color:#3a3435;font-weight:700;line-height: 35px; ">BASIC INFO</font></span><br>
                        <span style="font-size:14px; color:black;">Bill No: </span>&nbsp;&nbsp;&nbsp; #<span  class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $datas['bill_no'] }}</span><br>
                        <span style="font-size:14px; color:black;">Voucher NO: </span>&nbsp;&nbsp;&nbsp;<span  class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $datas['voucher_no'] }}</span><br>
                        <span style="font-size:14px; color:black;">Date: </span>&nbsp;&nbsp;&nbsp;<span  class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ date('d-m-Y', strtotime($datas['date'])) }}</span><br>
                        <span style="font-size:14px; color:black;">Time: </span>&nbsp;&nbsp;&nbsp;<span  class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $datas['time'] }}</span><br>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                     <div class="card">
                        <div class="card-body">
                        <span  class=""><font style="vertical-align: inherit;margin-bottom:25px;vertical-align: inherit;font-size:16px;color:#3a3435;font-weight:700;line-height: 35px; ">SUPPLIER INFO</font></span><br>
                        <span style="font-size:14px; color:black;">Name: </span>&nbsp;&nbsp;&nbsp;<span  class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $datas['supplier_name'] }}</span><br>
                        <span style="font-size:14px; color:black;">Contact No: </span>&nbsp;&nbsp;&nbsp;<span  class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $datas['supplier_phone_number'] }}</span><br>
                        <span style="font-size:14px; color:black;">Address: </span>&nbsp;&nbsp;&nbsp;<span  class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $datas['supplier_address'] }}</span><br>
                        </div>
                     </div>
                  </div>








               </div>
               <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-9 col-9  col-sm-11">
                  <h7 style="color:black;font-weight:700;">PRODUCTS</h7>
                     <div class="row">


                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Product</span>
                                 </div>
                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Quantity</span>
                                 </div>
                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Price / Count</span>
                                 </div>
                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class="" style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Amount</span>
                                 </div>
                     </div>
                     <div class="row ">
                           @foreach ($datas['terms'] as $index => $term_arr)
                              @if ($term_arr['purchase_id'] == $datas['id'])
                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class=""style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $term_arr['product_name'] }}</span>
                                 </div>
                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class=""style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $term_arr['quantity'] }}</span>
                                 </div>
                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class=""style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $term_arr['price'] }}</span>
                                 </div>
                                 <div class="col-lg-3 col-sm-3 col-12 border">
                                    <span class=""style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $term_arr['total_price'] }}</span>
                                 </div>
                              @endif
                           @endforeach
                     </div>
                  </div>
                  <div class="col-lg-1 col-1 col-sm-12"></div>

               </div><br/>
              
<br/>

         </div>

         <div class="row">
            <div class="col-lg-6 ">
               <div class="total-order w-100 max-widthauto mb-4">
                  <ul>
                     <li class="total">
                        <h4>Sub Total</h4>
                        <h5 class="">₹ <span  class="">{{ $datas['sub_total'] }}</span></h5>
                     </li>
                     <li class="total">
                        <h4>Tax Amount </h4>
                        <h5>₹ <span  class="">{{ $datas['tax_amount'] }}</span></h5>
                     </li>
                     <li class="total">
                        <h4>Total </h4>
                        <h5>₹ <span  class="">{{ $datas['total'] }}</span></h5>
                     </li>
                     <li class="total">
                        <h4>Discount Price</h4>
                        <h5>₹ <span  class="">{{ $datas['discount_price'] }}</span></h5>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-6 ">
               <div class="total-order w-100 max-widthauto mb-4">
                  <ul>
                  <li class="total">
                        <h4>Old Balance</h4>
                        <h5>₹ <span  class=""></span></h5>
                     </li>
                     <li class="total">
                        <h4>Grand Total</h4>
                        <h5>₹ <span  class="">{{ $datas['grandtotal'] }}</span></h5>
                     </li>
                     <li class="total">
                        <h4>Paid Amount</h4>
                        <h5 style="color:green">₹ <span  class="">{{ $datas['paidamount'] }}</span></h5>
                     </li>
                     <li class="total">
                        <h4>Balance Amount</h4>
                        <h5 style="color:red">₹ <span  class="">{{ $datas['balanceamount'] }}</span></h5>
                     </li>
                  </ul>
               </div>
               </div>
            </div>
         </div>
   </div>


        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


