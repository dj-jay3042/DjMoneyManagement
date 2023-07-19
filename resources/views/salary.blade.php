@extends('layout')

@section('activeSalary')
    active
@endsection

@section('pageTitle')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Leaves details</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Leave Reason</th>
                                <th>Total Days</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $item)
                                <tr>
                                    <td>{{ ++$lcount }}</td>
                                    <td>{{ $item->lReason }}</td>
                                    <td>
                                        @php
                                            $startDate = new DateTime($item->lStartDate);
                                            $endDate = new DateTime($item->lEndDate);
                                            
                                            $interval = $startDate->diff($endDate);
                                            if ($item->lType == 1)
                                                $add = 0.5;
                                            else 
                                                $add = 1;
                                            echo $interval->format('%a') + $add; // Get the difference in days
                                        @endphp
                                    </td>
                                    <td>{{ $item->lStartDate }}</td>
                                    <td>{{ $item->lEndDate }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Leave Reason</th>
                                <th>Total Days</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Salary Report</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Month</strong></td>
                                <td><strong>Working Days</strong></td>
                                <td><strong>Worked Days</strong></td>
                                <td><strong>Total Leaves</strong></td>
                                <td><strong>Salary</strong></td>
                            </tr>
                            @foreach ($work as $item)
                                <tr>
                                    <td>{{ ++$scount }}</td>
                                    <td>
                                        @switch($item->month)
                                            @case('1')
                                                January
                                            @break

                                            @case('2')
                                                February
                                            @break

                                            @case('3')
                                                March
                                            @break

                                            @case('4')
                                                April
                                            @break

                                            @case('5')
                                                May
                                            @break

                                            @case('6')
                                                June
                                            @break

                                            @case('7')
                                                July
                                            @break

                                            @case('8')
                                                August
                                            @break

                                            @case('9')
                                                September
                                            @break

                                            @case('10')
                                                October
                                            @break

                                            @case('11')
                                                November
                                            @break

                                            @case('12')
                                                December
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->workingDays . '.0' }}</td>
                                    <td>{{ $item->workedDays }}</td>
                                    <td>{{ $item->tl }}</td>
                                    <td>{{ ($item->workedDays < $item->workingDays) ? (($item->workedDays * 15000 / $item->workingDays) + (15000 / ($item->workingDays * 2))) : ($item->workedDays * 15000 / $item->workingDays) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
