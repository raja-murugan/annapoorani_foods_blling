@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Delivery Attendance</h4>
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
                        <a href="{{ route('delivery_attendance.breakfastcreate') }}" class="btn btn-added" style="margin-right: 10px;">BreakFast</a>
                        <a href="{{ route('delivery_attendance.lunchcreate') }}" class="btn btn-added" style="margin-right: 10px;background: #ab8a1c;">Lunch</a>
                        <a href="{{ route('delivery_attendance.dinnercreate') }}" class="btn btn-added" style="margin-right: 10px;background: #dc3545;">Dinner</a>
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
                                    <th class="border" style="border: 1px solid #8ea0af!important;">Name</th>
                                    @foreach ($list as $lists)
                                        <th colspan="3" class="border" style="text-align:center;border: 1px solid #8ea0af!important;">{{ $lists }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th style="border: 1px solid #8ea0af!important;"></th>
                                    @foreach ($list as $lists)
                                    @foreach ($session_terms as $session_termsarr)
                                    <th class="border" style="text-align:center;border: 1px solid #8ea0af!important;">{{$session_termsarr['session']}}</th>
                                    @endforeach
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="background: #dfe585;border-color: #33333357;"></td>
                                @foreach ($list as $lists)
                               @foreach ($session_terms as $session_termsarr)
                                     <td style="background: #edf0bb;border-color: #33333357;"><a href="{{ route('delivery_attendance.edit', ['date' => $year.'-'.$month. '-'.$lists, 'session_id' => $session_termsarr['id']]) }}" class="btn btn-sm btn-soft-info">
                                     <i class="fa fa-edit" data-bs-toggle="tooltip" title="fa fa-edit"></i></a></td>
                                @endforeach
                                @endforeach
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach ($Deliveryboy as $Deliveryboyarr)
                            <tr class="">
                                <td class="" style="background: #dfe585;color:black;border-color: #33333357;">{{$Deliveryboyarr->name}}</td>

                                @foreach ($attendence_Data as $attendence_Data_arr)
                                    @if ($Deliveryboyarr->id == $attendence_Data_arr['deliveryboyid'])

                                        @if ($attendence_Data_arr['attendence_status'] == 'P')
                                            <td class="" style="color:white;background-color:green;border-color: #33333357;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        @elseif ($attendence_Data_arr['attendence_status'] == 'A')
                                            <td class="" style="color:white;background-color:red;border-color: #33333357;" >{{ $attendence_Data_arr['attendence_status'] }}</td>
                                        
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
