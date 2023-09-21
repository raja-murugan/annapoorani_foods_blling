@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Delivery Attendance - <span style="color:red">{{ date('d-m-Y', strtotime($today))  }}</span></h4>
            </div>
            <div class="page-btn">

                <div style="display: flex;">
                        <form autocomplete="off" method="POST" action="{{ route('delivery_attendance.datefilter') }}">
                            @method('PUT')
                            @csrf
                            <div style="display: flex">
                                 <div style="margin-right: 10px;"><input type="date" name="from_date"
                                        class="form-control from_date" value="{{ $today }}"></div>
                                <div style="margin-right: 10px;"><input type="submit" class="btn btn-success"
                                        value="Search" /></div>
                            </div>
                        </form>
                        <a href="{{ route('delivery_attendance.create') }}" class="btn btn-added" style="margin-right: 10px;">Add New</a>
                </div>  
                    
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Delivery Boy</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance_data as $keydata => $datas)
                                <tr>
                                 <td>{{ ++$keydata }}</td>
                                    <td> {{ date('d-m-Y', strtotime($datas['date']))  }}</td>
                                    <td> {{ $datas['deliveryboy']  }}</td>
                                    <td>
                                            @foreach ($datas['terms'] as $index => $terms_array)
                                                    @if ($terms_array['deliveryattendance_id'] == $datas['id'])
                                                    {{ $terms_array['session'] }} - {{ $terms_array['attendance'] }},<br/>
                                                    @endif
                                                    @endforeach
                                    </td> 
                                    <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                            <li>
                                                <a href="#deliveryattendview{{ $datas['unique_key'] }}"
                                                    data-bs-toggle="modal" data-id="{{ $datas['id'] }}"
                                                    data-bs-target=".deliveryattendview-modal-xl{{ $datas['unique_key'] }}"
                                                    class="badges bg-lightred deliveryattendview" style="color: white">View</a>

                                            </li>
                                             <li>
                                                    <a href="{{ route('delivery_attendance.edit', ['unique_key' => $datas['unique_key']]) }}"
                                                        class="badges bg-lightgrey" style="color: white">Edit</a>
                                             </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade deliveryattendview-modal-xl{{ $datas['unique_key'] }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="purchaseviewLargeModalLabel{{ $datas['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.delivery_attendance.view')
                                </div>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
