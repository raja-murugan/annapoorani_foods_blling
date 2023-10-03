@extends('layout.backend.auth')

@section('content')

   <div class="content">
      <div class="page-header">
         <div class="page-title">
            <h4>Add Payoff</h4>
         </div>
      </div>



        <div class="card">
            <div class="card-body">
                <form autocomplete="off" method="POST" action="{{ route('payoff.store') }}" enctype="multipart/form-data">
                    @csrf


                  <div class="row">



                        
                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Date<span
                                        style="color: red;">*</span></label>
                                <input type="date" name="date" placeholder="" value="{{ $today }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Month<span
                                        style="color: red;">*</span></label>
                                 <select class="form-control js-example-basic-single salary_month select" name="salary_month[]" id="salary_month"required>
                                    <option value="" selected hidden class="text-muted">Select Month </option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                 </select>
                            </div>
                        </div>

                        
                  </div>

                    <br />

                    <div class="row">
                        <div class="table-responsive col-lg-12 col-sm-12 col-12">
                            <table class="table">
                                <thead>
                                    <tr style="background: #f8f9fa;">
                                        <th style="font-size:15px; width:30%;">Employee</th>
                                        <th style="font-size:15px; width:10%;">Total Days</th>
                                        <th style="font-size:15px; width:10%;">Present Days</th>
                                        <th style="font-size:15px; width:20%;">TotalSalary</th>
                                        <th style="font-size:15px; width:30%;">Paid Salary</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                @foreach ($employee as $employees)
                                    <tr>
                                        <td>
                                             <input type="hidden" id="employee_id" name="employee_id[]" value="{{$employees->id}}"/>
                                               <input type="text" id="employee_name"name="employee_name[]" value="{{$employees->name}}" readonly class="form-control"/>
                                        </td>
                                        <td><input type="text" id="totaldays"name="totaldays[]"  readonly value="{{$maxDays}}" class="form-control"/></td>
                                        <td><input type="text" id="total_presentdays"name="total_presentdays[]"  readonly class="form-control"/></td>
                                        <td><input type="text" id="total_salaryamount"name="total_salaryamount[]"  readonly class="form-control"/></td>
                                        <td><input type="text" id="salaryamount_given"name="salaryamount_given[]"  class="form-control"/></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                  </div>


                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" />
                        <a href="{{ route('payoff.index') }}" class="btn btn-danger" value="">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
