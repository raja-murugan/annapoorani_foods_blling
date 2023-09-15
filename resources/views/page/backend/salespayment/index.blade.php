@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sales Payment</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">


               <div class="card">
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table  datanew">
                              <thead>
                                 <tr>
                                    <th>Sl. No</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Paid Amount</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($salepayment_data as $keydata => $salepayment_datas)
                                    <tr>
                                          <td>{{ ++$keydata }}</td>
                                          <td>{{ $salepayment_datas['customer'] }}</td>
                                          <td>{{ $salepayment_datas['date'] }}</td>
                                          <td>{{ $salepayment_datas['paid_amount']  }}</td>
                                          <td>
                                             <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li>
                                                      
                                                </li>
                                                <li>
                                                      
                                                </li>
                                             </ul>
                                          </td>
                                    </tr>

                                    
                                 @endforeach
                              </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-4">

            @include('page.backend.salespayment.create')
            </div>
        </div>
        

       
    </div>
@endsection
