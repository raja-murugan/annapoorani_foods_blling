@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sales</h4>
            </div>
            
            <div class="page-btn">
                <div style="display: flex;">
                        <form autocomplete="off" method="POST" action="{{ route('sales.datefilter') }}">
                            @method('PUT')
                            @csrf
                            <div style="display: flex">
                                 <div style="margin-right: 10px;" >
                                       <select class="form-control" name="sales_type" id="sales_type">
                                          <option value="none">Status</option>
                                          <option value="Dine In">Dine In</option>
                                          <option value="Take Away">Take Away</option>
                                          <option value="Delivery">Delivery</option>
                                       </select>
                                 </div>
                                 <div style="margin-right: 10px;"><input type="date" name="from_date"
                                        class="form-control from_date" value="{{ $today }}"></div>
                                <div style="margin-right: 10px;"><input type="submit" class="btn btn-success"
                                        value="Search" /></div>
                            </div>
                        </form>
                        <a href="{{ route('sales.create') }}" class="btn btn-added" style="margin-right: 10px;">Add New</a>
                </div>   
            
                    
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>Bill No</th>
                                <th>Date</th>
                                <th>Sales Type</th>
                                <th>Customer</th>
                                <th>Payment Method</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale_data as $keydata => $datas)
                                <tr>
                                    <td>#{{ $datas['bill_no'] }}</td>
                                    <td> {{ $datas['date']  }}</td>
                                    <td> {{ $datas['sales_type']  }}</td>
                                    <td>{{ $datas['customer']}}</td>
                                    <td>{{ $datas['payment_method']   }}</td>
                                    <td>₹ {{ $datas['grandtotal']   }}</td> 
                                    <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                            <li>
                                                <a href="#delete{{ $datas['unique_key'] }}" data-bs-toggle="modal"
                                                    data-id="{{ $datas['unique_key'] }}"
                                                    data-bs-target=".salesedelete-modal-xl{{ $datas['unique_key'] }}"
                                                    class="badges bg-lightyellow" style="color: white">Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade salesedelete-modal-xl{{ $datas['unique_key'] }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="deleteLargeModalLabel{{ $datas['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.sales.delete')
                                </div>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
