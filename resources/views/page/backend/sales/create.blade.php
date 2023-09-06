@extends('layout.backend.noside-auth')

@section('content')
    <div class="page-wrapper ms-0">
        <div class="content">
            <form name="sales_store" id="sales_store" method="post" action="javascript:void(0)">
                @csrf
                <div class="row">


                <style>
                    .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
                </style>
                <div class="col-lg-9 col-sm-12">
                <div class="alert-success" style="display:none;">
                    <span class="closebtn">&times;</span>  
                    <strong>Success!</strong> Indicates a successful or positive action.
                </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-sm-12 tabs_wrapper">
                        <div class="page-header ">
                            <div class="page-title">
                                <h4>Categories</h4>
                                <h6>Manage your purchases</h6>
                            </div>
                        </div>
                        <div class="tabs-sets">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                @foreach ($session as $keydata => $sessions)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if ($keydata == 0) active @endif "
                                            id="purchase{{ $sessions->id }}-tab" data-bs-toggle="tab"
                                            onclick="sessiontype({{ $sessions->id }})"
                                            data-bs-target="#purchase{{ $sessions->id }}" type="button"
                                            aria-controls="purchase{{ $sessions->id }}" aria-selected="true" 
                                            role="tab">{{ $sessions->name }}</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>



                        <div class="tab-content" id="myTabContent">


                            @foreach ($session as $index => $session_ss)
                                <div class="tab-pane fade show cat_div @if ($session_ss->id == 1) active @endif "
                                    id="purchase{{ $session_ss->id }}" role="tabpanel"
                                    aria-labelledby="purchase{{ $session_ss->id }}-tab">
                                    <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                                        @foreach ($category as $categoryes)
                                            @if ($categoryes->session_id == $session_ss->id)
                                                <li class="@if ($categoryes->id == 1) active @endif  category_type "
                                                    id="fruits{{ $categoryes->id }}" data-cat_id="{{ $categoryes->id }}">
                                                    <div class="product-details ">
                                                        <img src="{{ asset('assets/backend/img/product/product63.png') }}"
                                                            alt="img">
                                                        <h6>{{ $categoryes->name }}</h6>
                                                        <input type="hidden" name="product_catid" id="product_catid" value="{{ $categoryes->id }}" />
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>


                        <div class="tabs_container">
                            @foreach ($category as $categories)
                                <div class="tab_content @if ($categories->id == 1) active @endif"
                                    data-tab="fruits{{ $categories->id }}">
                                    
                                    <div class="row prodcttsdiv" >
                                    @foreach ($product as $productss)
                                                @if ($productss->category_id == $categories->id)
                                                    <div class="col-lg-3 col-sm-6 d-flex  ">
                                                        <div class="productset flex-fill">
                                                            <div class="productsetimg">
                                                                <img src="{{ asset('assets/product/' . $productss->image) }}"
                                                                    alt="img">
                                                            </div>

                                                            <div class="productsetcontent">
                                                                <h4>{{ $productss->name }}</h4>
                                                                <div style="display: flex">
                                                                    <h6 class="pos-price">₹ {{ $productss->price }}.00</h6>
                                                                    <div class="increment-decrement"
                                                                        style="margin-left:31%;margin-bottom:10px;" hidden>
                                                                        <div class="input-groups">
                                                                            <input type="button" value="-"
                                                                                class="button-minus dec button">
                                                                            <input type="text"
                                                                                name="child{{ $productss->id }}" value="1"
                                                                                class="quantity-field child{{ $productss->id }}">
                                                                            <input type="button" value="+"
                                                                                class="button-plus inc button ">
                                                                        </div>
                                                                    </div>
                                                                    <h6><input type="button" name="add_to_cart"
                                                                            class="btn btn-scanner-set selectproduct addedproduct{{ $productss->id }}"
                                                                            data-product_id="{{ $productss->id }}"
                                                                            data-product_price="{{ $productss->price }}"
                                                                            id="addedproduct{{ $productss->id }}"
                                                                            style="background: #7367f0;font-size: 14px;font-weight: 700;color: #fff;"
                                                                            value="Add to cart" />
                                                                            <input type="button" value="Add to cart" style="display:none;" class="btn btn-scanner-set clickquantity{{ $productss->id }}  rise_quantity" onClick="increment_quantity({{ $productss->id }})"> </h6>
                                                                    <input type="hidden" name="singlequantity" id="singlequantity{{ $productss->id }}" class="form-control" value="1" />
                                                                    <input type="hidden" name="singlequantityprice" id="singlequantityprice{{ $productss->id }}" class="form-control" value="{{ $productss->price }}" />
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    
                                    

                                    
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12 ">
                        <div class="order-list">
                            <div class="orderid">
                                <h4>Order List</h4>
                                <h5>Bill No : #<span class="billno">{{ $latestbillno }}</span><input type="hidden"
                                        name="billno" id="billno" value="{{ $latestbillno }}" /></h5>
                            </div>
                            <div class="orderid">
                                <h5>
                                    <p class="current_date"></p>
                                </h5>
                                <h5>
                                    <p class="current_time"></p>
                                </h5>
                                <input type="hidden" name="date" id="date" class="currentdate" value="" />
                                <input type="hidden" name="time" id="time" class="currenttime" value="" />
                            </div>
                        </div>
                        <div class="card card-order">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="select-split ">
                                            <div class="select-group w-100">
                                                <div style="display: flex">
                                                    <div class="input-group" style="margin-right: 5px;">
                                                        <div class="input-group-text">
                                                            <input class="form-check-input" type="radio" value="Dine In" id ="sales_type" name="sales_type"
                                                                aria-label="Radio button for following text input" checked>
                                                        </div>
                                                        <input type="text" class="form-control" value="Dine In" disabled
                                                            aria-label="Text input with radio button">
                                                    </div>
                                                    <div class="input-group" style="margin-right: 5px;">
                                                        <div class="input-group-text">
                                                            <input class="form-check-input" type="radio" value="Take Away" id ="sales_type" name="sales_type"
                                                                aria-label="Radio button for following text input">
                                                        </div>
                                                        <input type="text" class="form-control" value="Take Away" disabled
                                                            aria-label="Text input with radio button">
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <input class="form-check-input" type="radio" value="Delivery" id ="sales_type" name="sales_type"
                                                                aria-label="Radio button for following text input">
                                                        </div>
                                                        <input type="text" class="form-control" value="Delivery" disabled
                                                            aria-label="Text input with radio button">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="select-split ">
                                            <div class="select-group w-100">
                                                <select class="select">
                                                    <option>Walk-in Customer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="totalitem">
                                    <h4>Total items : <span class="total_count"></span></h4>
                                    <a class="remove-ultr" hidden>Clear all</a>
                                </div>
                                <div class="product-table">
                                
                                </div>
                            </div>
                            <div class="split-card">
                            </div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li>
                                            <h5>Subtotal </h5>
                                            <h6 class="subtotalamount"></h6>
                                            <input type="hidden" name="subtotal" id="subtotal" value="" />
                                        </li>
                                        <li>
                                            <h5>Tax </h5>
                                            <h6>₹ 0</h6>
                                            <input type="hidden" name="taxamount" id="taxamount" value="0" />
                                        </li>
                                        <li class="total-value">
                                            <h5>Total </h5>
                                            <h6 class="subtotalamount"></h6>
                                            <input type="hidden" name="totalamount" id="totalamount" value="" />
                                        </li>
                                    </ul>
                                </div>
                                <div class="setvaluecash">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="select-split ">
                                                <div class="select-group w-100">
                                                    <div style="display: flex">
                                                        @foreach ($Bank as $Banks)
                                                        <div class="input-group" style="margin-right: 5px;">
                                                            <div class="input-group-text">
                                                                <input class="form-check-input" type="radio" value="{{ $Banks->name }}" id ="paymentmethod" name="paymentmethod"
                                                                    aria-label="Radio button for following text input">
                                                            </div>
                                                            <input type="text" class="form-control" value="{{ $Banks->name }}" disabled
                                                                aria-label="Text input with radio button">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Discount" class="sale_discount" name="sale_discount" id="sale_discount"/>
                                </div>
                                <div class="btn-totallabel">
                                    <button type="submit" class="btn btn-sm " id="submit"
                                        style="color:white; font-size:15px; display:contents;">Save<span class="grand_total"></span></button>
                                        <input type="hidden" name="grandtotal" class="grandtotal" id="grandtotal"/>
                                </div>
                                <div class="btn-pos">
                                    <ul>
                                        <li>
                                            <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img
                                                    src="{{ asset('assets/backend/img/icons/transcation.svg') }}"
                                                    alt="img" class="me-1">
                                                Transaction</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recent Transactions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab"
                                    data-bs-target="#purchase" type="button" aria-controls="purchase"
                                    aria-selected="true" role="tab">Dine In</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                                    type="button" aria-controls="payment" aria-selected="false" role="tab">Take
                                    Away</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return"
                                    type="button" aria-controls="return" aria-selected="false"
                                    role="tab">Delivery</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img
                                                    src="{{ asset('assets/backend/img/icons/search-white.svg') }}"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('assets/backend/img/icons/pdf.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('assets/backend/img/icons/excel.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('assets/backend/img/icons/printer.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount </th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img
                                                    src="{{ asset('assets/backend/img/icons/search-white.svg') }}"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('assets/backend/img/icons/pdf.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('assets/backend/img/icons/excel.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('assets/backend/img/icons/printer.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount </th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="return" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img
                                                    src="{{ asset('assets/backend/img/icons/search-white.svg') }}"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('assets/backend/img/icons/pdf.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('assets/backend/img/icons/excel.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('assets/backend/img/icons/printer.svg') }}"
                                                        alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount </th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}"
                                                            alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
