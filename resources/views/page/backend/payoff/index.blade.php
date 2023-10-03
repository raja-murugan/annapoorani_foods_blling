@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Payoff</h4>
            </div>
            <div class="page-btn">

                <div style="display: flex;">
                        <form autocomplete="off" method="POST" action="{{ route('payoff.datefilter') }}">
                            @method('PUT')
                            @csrf
                            <div style="display: flex">
                                 <div style="margin-right: 10px;"><input type="date" name="from_date"
                                        class="form-control from_date" value="{{ $today }}"></div>
                                <div style="margin-right: 10px;"><input type="submit" class="btn btn-success"
                                        value="Search" /></div>
                            </div>
                        </form>
                        <a href="{{ route('payoff.create') }}" class="btn btn-added" style="margin-right: 10px;">Add New</a>
                </div>  
                    
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Salary Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $keydata => $datas)
                                <tr>
                                    <td> {{ date('d-m-Y', strtotime($datas->date))  }}</td>
                                    <td> {{ $datas->total_salaryamount  }}</td>
                                    <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                            <li>
                                                <a href="#salaryview{{ $datas->unique_key }}"
                                                    data-bs-toggle="modal" data-bs-target=".salaryview-modal-xl{{ $datas->unique_key }}"
                                                    class="badges bg-lightred salaryview" style="color: white">View</a>

                                            </li>
                                             <li>
                                                    <a href="{{ route('payoff.edit', ['unique_key' => $datas->unique_key]) }}"
                                                        class="badges bg-lightgrey" style="color: white">Edit</a>
                                             </li>
                                            <li>
                                                <a href="#delete{{ $datas->unique_key }}" data-bs-toggle="modal"
                                                    data-id="{{ $datas->unique_key }}"
                                                    data-bs-target=".payoffdelete-modal-xl{{ $datas->unique_key }}"
                                                    class="badges bg-lightyellow" style="color: white">Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade salaryview-modal-xl{{ $datas->unique_key }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="purchaseviewLargeModalLabel{{ $datas->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.payoff.view')
                                </div>

                                <div class="modal fade payoffdelete-modal-xl{{ $datas->unique_key }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="deleteLargeModalLabel{{ $datas->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.payoff.delete')
                                </div>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
