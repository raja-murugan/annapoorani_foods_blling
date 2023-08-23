@extends('layout.backend.noside-auth')

@section('content')
    <div class="page-wrapper ms-0">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-sm-12 tabs_wrapper">
                    <div class="page-header ">
                        <div class="page-title">
                            <h4>Categories</h4>
                            <h6>Manage your purchases</h6>
                        </div>
                    </div>


<ul class="nav nav-tabs" id="myTab" role="tablist">
   <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a>
  </li>
@foreach ($session as $sessions)
  <li class="nav-item" role="presentation">
    <a class="nav-link " id="home{{$sessions->id}}-tab" data-bs-toggle="tab" href="#home{{$sessions->id}}" role="tab" aria-controls="home{{$sessions->id}}" aria-selected="true">{{$sessions->name}}</a>
  </li>
@endforeach 
</ul>
            <div class="tab-content" id="myTabContent">

                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                        @foreach ($category as $categoryiies)
                           <li class="" id="orange{{$categoryiies->id}}" style="border-color: #5151d3;">
                              <div class="product-details ">
                                 <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                 <h6>{{$categoryiies->name}}</h6>
                              </div>
                           </li>
                        @endforeach 
                     </ul>
                  </div>

               @foreach ($session as $session_ss)
                  <div class="tab-pane fade show" id="home{{$session_ss->id}}" role="tabpanel" aria-labelledby="home{{$session_ss->id}}-tab">
                     <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">

                        @foreach ($category as $categoryes)
                           @if ($categoryes->session_id == $session_ss->id)
                           <li class="@if ($categoryes->session_id === $session_ss->id) active='active' @endif" id="fruits{{$categoryes->id}}" >
                              <div class="product-details " style="border-color: #5151d3;">
                                 <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                 <h6>{{$categoryes->name}}</h6>
                              </div>
                           </li>
                           @endif
                        @endforeach 
                     </ul>
                  </div>
                  @endforeach 

            </div>







                
                    <div class="tabs_container">

                    <div class="" style="text-align:right;">
                        <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs">Add to Move</button>
                     </div>

                           @foreach ($category as $categriies)
                           <div class="tab_content " data-tab="orange{{$categriies->id}}">
                              <div class="row ">
                              @foreach ($product as $produ_tss)
                              @if ($produ_tss->category_id == $categriies->id)
                                 <div class="col-lg-3 col-sm-6 d-flex ">
                                       <div class="productset flex-fill ">
                                          <div style="border:1px solid #ccc; border-radius:5px; padding:16px; height:300px;text-align:center"  id="product_{{$produ_tss->id}}">
                                             <img src="{{ asset('assets/product/' .$produ_tss->image) }}" alt="img">
                                          
                                             <h4 class="text-info">
                                                <div class="checkbox">
                                                   <lable style="color:black"><input type="checkbox"  value="{{$produ_tss->id}}" name="productids" class="select_product" data-product_id="{{$produ_tss->id}}"
                                                          data-product_name="{{$produ_tss->name}}" data-product_price="{{$produ_tss->price}}"/>{{$produ_tss->name}}</lable>
                                                </div>
                                             </h4>
                                             <h4 class="text-danger">₹  {{$produ_tss->price}}</h4>
                                          </div>
                                       </div>
                                 </div>
                                @endif
                                @endforeach 
                              </div>
                           </div>

                           @endforeach 


                           @foreach ($category as $categories)
                           
                           <div class="tab_content" data-tab="fruits{{$categories->id}}">
                              <div class="row ">
                              @foreach ($product as $productss)

                                 @if ($productss->category_id == $categories->id)
                                 <div class="col-lg-3 col-sm-6 d-flex ">
                                       <div class="productset flex-fill ">
                                          <div style="border:1px solid #ccc; border-radius:5px; padding:16px; height:300px;text-align:center"  id="product_{{$productss->id}}">
                                             <img src="{{ asset('assets/product/' .$productss->image) }}" alt="img">
                                          
                                             <h4 class="text-info">
                                                <div class="checkbox">
                                                   <lable style="color:black"><input type="checkbox"  value="{{$productss->id}}" name="productids" class="select_product" data-product_id="{{$productss->id}}"
                                                          data-product_name="{{$productss->name}}" data-product_price="{{$productss->price}}"/>{{$productss->name}}</lable>
                                                </div>
                                             </h4>
                                             <h4 class="text-danger">₹  {{$productss->price}}</h4>
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
                            <h5>Bill No : #1</h5>
                        </div>
                    </div>
                    <div class="card card-order">
                        <div class="card-body">
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
                        <div class="split-card">
                        </div>
                        <div class="card-body pt-0">
                            <div class="totalitem">
                                <h4>Total items : 4</h4>
                                <a href="javascript:void(0);">Clear all</a>
                            </div>
                            <div class="table-responsive" id="">
                                <table class="table ">
                                 <thead>
                                 <tr>
                                       <th>#</th>
                                       <th>Product</th>
                                       <th>Price</th>
                                       <th>Quantiy</th>
                                       <th>Total</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody id="shopping_cart">

                                 </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <div class="split-card">
                        </div>
                        <div class="card-body pt-0 pb-2">
                            <div class="setvalue">
                                <ul>
                                    <li>
                                        <h5>Subtotal </h5>
                                        <h6 class="sales_subtotal"></h6>
                                    </li>
                                    <li>
                                        <h5>Tax </h5>
                                        <h6>5.00$</h6>
                                    </li>
                                    <li class="total-value">
                                        <h5>Total </h5>
                                        <h6>60.00$</h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="setvaluecash">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="paymentmethod">
                                            <img src="{{ asset('assets/backend/img/icons/cash.svg') }}" alt="img" class="me-2">
                                            Cash
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="paymentmethod">
                                            <img src="{{ asset('assets/backend/img/icons/debitcard.svg') }}" alt="img" class="me-2">
                                            Online
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-totallabel">
                                <h5>Save</h5>
                                <h6>60.00$</h6>
                            </div>
                            <div class="btn-pos">
                                <ul>
                                    <li>
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img
                                                src="{{ asset('assets/backend/img/icons/transcation.svg') }}" alt="img" class="me-1">
                                            Transaction</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    type="button" aria-controls="payment" aria-selected="false"
                                    role="tab">Take Away</button>
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
                                            <a class="btn btn-searchset"><img src="{{ asset('assets/backend/img/icons/search-white.svg') }}"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('assets/backend/img/icons/pdf.svg') }}" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('assets/backend/img/icons/excel.svg') }}" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('assets/backend/img/icons/printer.svg') }}" alt="img"></a>
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                            <a class="btn btn-searchset"><img src="{{ asset('assets/backend/img/icons/search-white.svg') }}"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('assets/backend/img/icons/pdf.svg') }}" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('assets/backend/img/icons/excel.svg') }}" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('assets/backend/img/icons/printer.svg') }}" alt="img"></a>
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                            <a class="btn btn-searchset"><img src="{{ asset('assets/backend/img/icons/search-white.svg') }}"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('assets/backend/img/icons/pdf.svg') }}" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('assets/backend/img/icons/excel.svg') }}" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('assets/backend/img/icons/printer.svg') }}" alt="img"></a>
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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
                                                        <img src="{{ asset('assets/backend/img/icons/delete.svg') }}" alt="img">
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

