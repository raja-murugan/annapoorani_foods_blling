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
                    <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                        <li class="active" id="fruits">
                            <div class="product-details ">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Fruits</h6>
                            </div>
                        </li>
                        <li id="headphone">
                            <div class="product-details ">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Headphones</h6>
                            </div>
                        </li>
                        <li id="Accessories">
                            <div class="product-details">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Accessories</h6>
                            </div>
                        </li>
                        <li id="Shoes">
                            <a class="product-details">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Shoes</h6>
                            </a>
                        </li>
                        <li id="computer">
                            <a class="product-details">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Computer</h6>
                            </a>
                        </li>
                        <li id="Snacks">
                            <a class="product-details">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Snacks</h6>
                            </a>
                        </li>
                        <li id="watch">
                            <a class="product-details">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Watches</h6>
                            </a>
                        </li>
                        <li id="cycle">
                            <a class="product-details">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Cycles</h6>
                            </a>
                        </li>
                        <li id="fruits1">
                            <div class="product-details ">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Fruits</h6>
                            </div>
                        </li>
                        <li id="headphone1">
                            <div class="product-details ">
                                <img src="{{ asset('assets/backend/img/product/product63.png') }}" alt="img">
                                <h6>Headphones</h6>
                            </div>
                        </li>
                    </ul>
                    <div class="tabs_container">
                        <div class="tab_content active" data-tab="fruits">
                            <div class="row ">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill active">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Orange</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Strawberry</h4>
                                            <h6>15.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Banana</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Limon</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Apple</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="headphone">
                            <div class="row ">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Headphones</h5>
                                            <h4>Earphones</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Headphones</h5>
                                            <h4>Earphones</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Headphones</h5>
                                            <h4>Earphones</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="Accessories">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Accessories</h5>
                                            <h4>Sunglasses</h4>
                                            <h6>15.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Accessories</h5>
                                            <h4>Pendrive</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Accessories</h5>
                                            <h4>Mouse</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="Shoes">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Shoes</h5>
                                            <h4>Red nike</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="computer">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Computers</h5>
                                            <h4>Desktop</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="Snacks">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Snacks</h5>
                                            <h4>Duck Salad</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Snacks</h5>
                                            <h4>Breakfast board</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Snacks</h5>
                                            <h4>California roll</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Snacks</h5>
                                            <h4>Sashimi</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="watch">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h4>Watch</h4>
                                            <h5>Watch</h5>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                        </div>
                                        <div class="productsetcontent">
                                            <h4>Watch</h4>
                                            <h5>Watch</h5>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="cycle">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h4>Cycle</h4>
                                            <h5>Cycle</h5>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h4>Cycle</h4>
                                            <h5>Cycle</h5>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="fruits1">
                            <div class="row ">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Orange</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 1.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Strawberry</h4>
                                            <h6>15.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Banana</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Fruits</h5>
                                            <h4>Limon</h4>
                                            <h6>1500.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_content" data-tab="headphone1">
                            <div class="row ">
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Headphones</h5>
                                            <h4>Earphones</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Headphones</h5>
                                            <h4>Earphones</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex ">
                                    <div class="productset flex-fill">
                                        <div class="productsetimg">
                                            <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            <h6>Qty: 5.00</h6>
                                            <div class="check-product">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="productsetcontent">
                                            <h5>Headphones</h5>
                                            <h4>Earphones</h4>
                                            <h6>150.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 ">
                    <div class="order-list">
                        <div class="orderid">
                            <h4>Order List</h4>
                            <h5>Transaction id : #65565</h5>
                        </div>
                        <div class="actionproducts">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="deletebg confirm-text"><img
                                            src="{{ asset('assets/backend/img/icons/delete-2.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <img src="{{ asset('assets/backend/img/icons/ellipise1.svg') }}" alt="img">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                        data-popper-placement="bottom-end">
                                        <li>
                                            <a href="#" class="dropdown-item">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item">Another Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item">Something Elses</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card card-order">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                        data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
                                </div>
                                <div class="col-lg-12">
                                    <div class="select-split ">
                                        <div class="select-group w-100">
                                            <select class="select">
                                                <option>Walk-in Customer</option>
                                                <option>Chris Moris</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="select-split">
                                        <div class="select-group w-100">
                                            <select class="select">
                                                <option>Product </option>
                                                <option>Barcode</option>
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
                            <div class="product-table">
                                <ul class="product-lists">
                                    <li>
                                        <div class="productimg">
                                            <div class="productimgs">
                                                <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            </div>
                                            <div class="productcontet">
                                                <h4>Pineapple
                                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#edit"><img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}"
                                                            alt="img"></a>
                                                </h4>
                                                <div class="productlinkset">
                                                    <h5>PT001</h5>
                                                </div>
                                                <div class="increment-decrement">
                                                    <div class="input-groups">
                                                        <input type="button" value="-"
                                                            class="button-minus dec button">
                                                        <input type="text" name="child" value="0"
                                                            class="quantity-field">
                                                        <input type="button" value="+"
                                                            class="button-plus inc button ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>3000.00 </li>
                                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                                src="{{ asset('assets/backend/img/icons/delete-2.svg') }}" alt="img"></a></li>
                                </ul>
                                <ul class="product-lists">
                                    <li>
                                        <div class="productimg">
                                            <div class="productimgs">
                                                <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            </div>
                                            <div class="productcontet">
                                                <h4>Pineapple
                                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#edit"><img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}"
                                                            alt="img"></a>
                                                </h4>
                                                <div class="productlinkset">
                                                    <h5>PT001</h5>
                                                </div>
                                                <div class="increment-decrement">
                                                    <div class="input-groups">
                                                        <input type="button" value="-"
                                                            class="button-minus dec button">
                                                        <input type="text" name="child" value="0"
                                                            class="quantity-field">
                                                        <input type="button" value="+"
                                                            class="button-plus inc button ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>3000.00 </li>
                                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                                src="{{ asset('assets/backend/img/icons/delete-2.svg') }}" alt="img"></a></li>
                                </ul>
                                <ul class="product-lists">
                                    <li>
                                        <div class="productimg">
                                            <div class="productimgs">
                                                <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            </div>
                                            <div class="productcontet">
                                                <h4>Pineapple
                                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#edit"><img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}"
                                                            alt="img"></a>
                                                </h4>
                                                <div class="productlinkset">
                                                    <h5>PT001</h5>
                                                </div>
                                                <div class="increment-decrement">
                                                    <div class="input-groups">
                                                        <input type="button" value="-"
                                                            class="button-minus dec button">
                                                        <input type="text" name="child" value="0"
                                                            class="quantity-field">
                                                        <input type="button" value="+"
                                                            class="button-plus inc button ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>3000.00 </li>
                                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                                src="{{ asset('assets/backend/img/icons/delete-2.svg') }}" alt="img"></a></li>
                                </ul>
                                <ul class="product-lists">
                                    <li>
                                        <div class="productimg">
                                            <div class="productimgs">
                                                <img src="{{ asset('assets/backend/img/product/product62.jpg') }}" alt="img">
                                            </div>
                                            <div class="productcontet">
                                                <h4>Pineapple
                                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#edit"><img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}"
                                                            alt="img"></a>
                                                </h4>
                                                <div class="productlinkset">
                                                    <h5>PT001</h5>
                                                </div>
                                                <div class="increment-decrement">
                                                    <div class="input-groups">
                                                        <input type="button" value="-"
                                                            class="button-minus dec button">
                                                        <input type="text" name="child" value="0"
                                                            class="quantity-field">
                                                        <input type="button" value="+"
                                                            class="button-plus inc button ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>3000.00 </li>
                                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                                src="{{ asset('assets/backend/img/icons/delete-2.svg') }}" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="split-card">
                        </div>
                        <div class="card-body pt-0 pb-2">
                            <div class="setvalue">
                                <ul>
                                    <li>
                                        <h5>Subtotal </h5>
                                        <h6>55.00$</h6>
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
                                            Debit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="paymentmethod">
                                            <img src="{{ asset('assets/backend/img/icons/scan.svg') }}" alt="img" class="me-2">
                                            Scan
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-totallabel">
                                <h5>Checkout</h5>
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
