@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Employee Attendance</h4>
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
            <div class="card-body" style="overflow: auto;">


                <div class="row">
                    <table class="table">
                        <thead><h5 style="text-transform: uppercase;text-align:center;color:black;padding-bottom:10px">{{ $curent_month}} - {{$year}}</h5></thead>
                        <thead>
                            <tr>
                                <th class="border">Date</th>
                                 @foreach ($list as $lists)
                                    <th class="border">{{ $lists }}</th>
                                  @endforeach
                            </tr>
                            <tr>
                                <th class="border">Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border">Add / Edit</td>
                                @foreach ($monthdates as $monthdate_arr)
                                     <td class="border"  style=""><a href="{{ route('emp_attendance.edit', ['date' => $monthdate_arr]) }}" class="btn btn-sm btn-soft-info">
                                        <img src="{{ asset('assets/backend/img/icons/edit-5.svg') }}" alt="img"></a></td>
                                @endforeach
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach ($data as $employee)
                            <tr class="">
                                <td class="" style="color:black;">{{$employee->name}}</td>

                                @foreach ($attendence_Data as $attendence_Data_arr)
                                    @if ($employee->id == $attendence_Data_arr['empid'])

                                        @if ($attendence_Data_arr['attendence_status'] == 'P')
                                            <td class="border" style="color:green;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        @elseif ($attendence_Data_arr['attendence_status'] == 'A')
                                            <td class="border" style="color:red;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        @elseif ($attendence_Data_arr['attendence_status'] == 'L')
                                            <td class="border" style="color:blue;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        @elseif ($attendence_Data_arr['attendence_status'] == 'SL')
                                            <td class="border" style="color:orange;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                            @else
                                             <td class="border" style=""></td>
                                        @endif

                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection
