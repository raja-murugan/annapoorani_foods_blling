@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Employee Attendance - <span style="color:red">{{$Current_month}} {{$current_year}}</span></h4>
            </div>
            <div class="page-btn">

                <div style="display: flex;">
                        <form autocomplete="off" method="POST" action="{{ route('emp_attendance.datefilter') }}">
                            @method('PUT')
                            @csrf
                            <div style="display: flex">
                                 <div style="margin-right: 10px;"><input type="date" name="from_date"
                                        class="form-control from_date" value="{{ $today }}"></div>
                                <div style="margin-right: 10px;"><input type="submit" class="btn btn-success"
                                        value="Search" /></div>
                            </div>
                        </form>
                        <a href="{{ route('emp_attendance.create') }}" class="btn btn-added" style="margin-right: 10px;">Add New</a>
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
                                <th>Time</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance_data as $keydata => $datas)
                                <tr>
                                 <td>{{ ++$keydata }}</td>
                                    <td> {{ date('d-m-Y', strtotime($datas['date']))  }}</td>
                                    <td> {{ $datas['time']  }}</td>
                                    <td>
                                        <span> Present - {{ $datas['present_count']  }}</span><br/>
                                        <span> Absent - {{ $datas['absent_count']  }}</span><br/>
                                        <span> Leave - {{ $datas['leave_count']  }}</span><br/>
                                        <span> Sick Leave - {{ $datas['sickleave_count']  }}</span>
                                    </td> 
                                    <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                            <li>
                                                <a href="#empattendview{{ $datas['unique_key'] }}"
                                                    data-bs-toggle="modal" data-id="{{ $datas['id'] }}"
                                                    data-bs-target=".empattendview-modal-xl{{ $datas['unique_key'] }}"
                                                    class="badges bg-lightred empattendview" style="color: white">View</a>

                                            </li>
                                             <li>
                                                    <a href="{{ route('emp_attendance.edit', ['unique_key' => $datas['unique_key']]) }}"
                                                        class="badges bg-lightgrey" style="color: white">Edit</a>
                                             </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade empattendview-modal-xl{{ $datas['unique_key'] }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="purchaseviewLargeModalLabel{{ $datas['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.emp_attendance.view')
                                </div>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection