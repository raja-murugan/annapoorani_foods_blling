@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sales</h4>
            </div>
            <div class="page-btn">
            <a href="{{ route('sales.create') }}" class="btn btn-added" style="margin-right: 10px;">Add
                            New</a>
                    
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Bill No</th>
                                <th>Sub Total</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $keydata => $datas)
                                <tr>
                                    <td>{{ ++$keydata }}</td>
                                    <td>#{{ $datas->bill_no }}</td>
                                    <td>₹ {{ $datas->sub_total  }}</td>
                                    <td>₹ {{ $datas->tax  }}</td>
                                    <td>₹ {{ $datas->total   }}</td> 
                                    <td>{{ $datas->payment_method   }}</td>
                                    <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                            <li>
                                                <a href="#delete{{ $datas->unique_key }}" data-bs-toggle="modal"
                                                    data-id="{{ $datas->unique_key }}"
                                                    data-bs-target=".salesedelete-modal-xl{{ $datas->unique_key }}"
                                                    class="badges bg-lightyellow" style="color: white">Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade salesedelete-modal-xl{{ $datas->unique_key }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="deleteLargeModalLabel{{ $datas->unique_key }}"
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
