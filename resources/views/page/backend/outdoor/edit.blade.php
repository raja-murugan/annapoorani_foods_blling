@extends('layout.backend.auth')

@section('content')

   <div class="content">
      <div class="page-header">
         <div class="page-title">
            <h4>Update Outdoor</h4>
         </div>
      </div>



        <div class="card">
            <div class="card-body">
               <form autocomplete="off" method="POST" action="{{ route('outdoor.update', ['unique_key' => $Outdoor->unique_key]) }}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf


                  <div class="row">

                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Bill No<span
                                        style="color: red;">*</span></label>
                                <input type="text" name="bill_no" placeholder="Enter Bill No" readonly value="{{$Outdoor->bill_no}}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Booking Date<span
                                        style="color: red;">*</span></label>
                                <input type="date" name="booking_date" placeholder="" value="{{ $Outdoor->booking_date }}" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Delivery Date<span
                                        style="color: red;">*</span></label>
                                <input type="date" name="delivery_date" placeholder="" value="{{ $Outdoor->delivery_date }}"  required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Delivery Time<span
                                        style="color: red;">*</span></label>
                                <input type="time" name="delivery_time" placeholder="" value="{{ $Outdoor->delivery_time }}" required>
                            </div>
                        </div>

                  </div><br/>
                  <div class="row">

                        <div class="col-lg-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Name<span
                                        style="color: red;">*</span></label>
                                <input type="text" name="name" placeholder="Enter Customer Name" value="{{ $Outdoor->name }}">
                            </div>
                        </div>


                        <div class="col-lg-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Address<span
                                        style="color: red;">*</span></label>
                                <input type="text" name="address" placeholder="Enter Customer Address" value="{{ $Outdoor->address }}">
                            </div>
                        </div>


                        <div class="col-lg-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Phone No<span
                                        style="color: red;">*</span></label>
                                <input type="text" name="phone_number" placeholder="Enter Customer Phone No" value="{{ $Outdoor->phone_number }}">
                            </div>
                        </div>

                      
                        <div class="col-lg-12 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Note</label>
                                <input type="text" name="note" placeholder="Enter note" value="{{ $Outdoor->note }}">
                            </div>
                        </div>


                      
                  </div>

                    <br /><br/>

                  <div class="row">
                        <div class="table-responsive col-lg-12 col-sm-12 col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="font-size:15px; width:30%;">Product</th>
                                        <th style="font-size:15px; width:20%;">Quantity</th>
                                        <th style="font-size:15px; width:20%;">Price / Qty</th>
                                        <th style="font-size:15px; width:20%;">Total</th>
                                        <th style="font-size:15px; width:10%;">Action </th>
                                    </tr>
                                </thead>
                                <tbody class="outdoor_fields">
                                @foreach ($Outdoordata as $index => $Outdoordatas)
                                    <tr>
                                       <td><input type="hidden"id="outdoor_detail_id"name="outdoor_detail_id[]" value="{{ $Outdoordatas->id }}"/>
                                          <input type="text" class="form-control product" id="product" name="product[]"placeholder="product" value="{{ $Outdoordatas->product }}" required />
                                       </td>
                                       <td><input type="text" class="form-control outdoorquantity" id="outdoorquantity" name="outdoorquantity[]" placeholder="quantity" value="{{ $Outdoordatas->quantity }}" required /></td>
                                        <td>
                                            <input type="text" class="form-control outdoorpriceperquantity" id="outdoorpriceperquantity" name="outdoorpriceperquantity[]" placeholder="note" value="{{ $Outdoordatas->price_per_quantity }}" required />
                                        </td>
                                        <td><input type="text" class="form-control outdoorprice" id="outdoorprice" name="outdoorprice[]" placeholder="Price" value="{{ $Outdoordatas->price }}" required /></td>
                                        <td>
                                            <button style="width: 35px;"class="py-1 text-white font-medium rounded-lg text-sm  text-center btn btn-primary addoutdoorfields"
                                                type="button" id="" value="Add">+</button>
                                             <button style="width: 35px;" class="py-1 text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-outdoortr" type="button" >-</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                  </div>
                  <br />



                  <div class="row">
                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Tax<span
                                        style="color: red;">*</span></label>
                                       <select class="select outdoortax" name="outdoortax" id="outdoortax" required>
                                             <option value="0"@if ('0' === $Outdoor->outdoortax) selected='selected' @endif>No Tax</option>
                                             <option value="3"@if ('3' === $Outdoor->outdoortax) selected='selected' @endif>GST - (3%)</option>
                                             <option value="8"@if ('8' === $Outdoor->outdoortax) selected='selected' @endif>GST - (8%)</option>
                                             <option value="12"@if ('12' === $Outdoor->outdoortax) selected='selected' @endif>GST - (12%)</option>
                                             <option value="18"@if ('18' === $Outdoor->outdoortax) selected='selected' @endif>GST - (18%)</option>
                                             <option value="28"@if ('28' === $Outdoor->outdoortax) selected='selected' @endif>GST - (28%)</option>
                                       </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Payment Method<span
                                        style="color: red;">*</span></label>
                                 <select class="select bank_id" name="bank_id" id="bank_id" required>
                                    @foreach ($Bank as $banks)
                                       <option value="{{ $banks->id }}"@if ($banks->id === $Outdoor->bank_id) selected='selected' @endif>{{ $banks->name }}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                  </div>

                  <br /><br />


                  <div class="row">
                        <div class="col-lg-12 float-md-right">
                           <div class="total-order">
                              <ul>
                                 <li>
                                    <h4>Gross Amount</h4>
                                    <h5><span class="outdoorsubtotal"> ₹  {{ $Outdoor->sub_total }} </span></h5>
                                    <input type="hidden" class="form-control outdoorsub_total" name="outdoorsub_total" id="outdoorsub_total" value="{{ $Outdoor->sub_total }}">
                                 </li>
                                 <li>
                                    <h4>Tax Amount </h4>
                                    <h5><span class="outdoortaxamount">  ₹  {{ $Outdoor->outdoortax_amount }}</span></h5>
                                    <input type="hidden" class="form-control outdoortax_amount" name="outdoortax_amount" id="outdoortax_amount" value="{{ $Outdoor->outdoortax_amount }}">
                                 </li>
                                 <li class="total">
                                    <h4>Grand Total</h4>
                                    <h5><span class="outdoorgrandtotal"> ₹  {{ $Outdoor->total }} </span></h5>
                                    <input type="hidden" class="form-control outdoor_grandtotal" name="outdoor_grandtotal" id="outdoor_grandtotal" value="{{ $Outdoor->total }}">
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <br /><br />


                     <div class="row" hidden>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Payment Term<span
                                        style="color: red;">*</span></label>
                                        <select class="select payment_term" name="payment_term" id="payment_term" >
                                             <option value="">Select</option>
                                             <option value="I">I</option>
                                             <option value="II">II</option>
                                             <option value="III">III</option>
                                       </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Payable Amount<span
                                        style="color: red;">*</span></label>
                                <input type="text" name="payment_amount" class="payment_amount" placeholder="Enter Payable Amount"  style="background: #d1e9d0;">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Balance Amount<span
                                        style="color: red;">*</span></label>
                                <input type="text" name="balanceamount" class="balanceamount" placeholder=" Balance" readonly style="background: #e79fa6de;">
                            </div>
                        </div>
                     </div>

               


                   



                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" onclick="outdoorsubmitForm(this);" />
                        <a href="{{ route('outdoor.index') }}" class="btn btn-danger" value="">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
