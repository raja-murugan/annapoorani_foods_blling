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
            <div class="card-body" style="overflow: auto;background: #c7eda4;">


                <div class="row">
                    <table class="table">
                        <thead><h5 style="text-transform: uppercase;text-align:center;color:black;padding-bottom:10px">{{ $curent_month}}-{{$year}}</h5></thead>
                        <thead>
                            <tr style="background: #dfe585;">
                                <th class="" style="border-color: #33333357;">Name</th>
                                 @foreach ($list as $lists)
                                    <th class="" style="border-color: #33333357;">{{ $lists }}</th>
                                  @endforeach
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td style="background: #dfe585;border-color: #33333357;"></td>
                                @foreach ($monthdates as $monthdate_arr)
                                     <td style="background: #edf0bb;border-color: #33333357;"><a href="{{ route('emp_attendance.edit', ['date' => $monthdate_arr]) }}" class="btn btn-sm btn-soft-info">
                                     <i class="fa fa-edit" data-bs-toggle="tooltip" title="fa fa-edit"></i></a></td>
                                @endforeach
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach ($data as $employee)
                            <tr class="">
                                <td class="" style="background: #dfe585;color:black;border-color: #33333357;">{{$employee->name}}</td>

                                @foreach ($attendence_Data as $attendence_Data_arr)
                                    @if ($employee->id == $attendence_Data_arr['empid'])

                                        @if ($attendence_Data_arr['attendence_status'] == 'P')
                                            <td class="" style="color:white;background-color:green;border-color: #33333357;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        @elseif ($attendence_Data_arr['attendence_status'] == 'A')
                                            <td class="" style="color:white;background-color:red;border-color: #33333357;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        @elseif ($attendence_Data_arr['attendence_status'] == 'L')
                                            <td class="" style="color:white;background-color:blue;border-color: #33333357;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        @elseif ($attendence_Data_arr['attendence_status'] == 'SL')
                                            <td class="" style="color:white;background-color:orange;border-color: #33333357;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                            @else
                                             <td class="" style="background: azure;border-color: #33333357;"></td>
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
