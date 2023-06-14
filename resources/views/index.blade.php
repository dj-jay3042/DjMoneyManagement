@extends('layout')

@section('activeDb')
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
                    <h3 class="card-title"><strong>Transection details</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Transection No.</th>
                                <th>Title</th>
                                <th>Entity</th>
                                <th>Amount</th>
                                <th>Transection Type</th>
                                <th>Method</th>
                                <th>Date Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>{{ $item->traTitle }}</td>
                                    <td>{{ $item->traEntity }}</td>
                                    <td>{{ $item->traAmount }}</td>
                                    <td>
                                        @if ($item->traType == 1)
                                            <span class="badge bg-olive">Credit</span>
                                        @else
                                            <span class="badge bg-danger">Debit</span>
                                        @endif
                                    </td>
                                    <td>
                                        @switch($item->traMethod)
                                            @case('0')
                                                <span class="badge bg-info">Cash</span>
                                            @break

                                            @case('1')
                                                <span class="badge bg-primary">Paytm</span>
                                            @break

                                            @case('2')
                                                <span class="badge bg-success">Google Pay</span>
                                            @break

                                            @case('3')
                                                <span class="badge bg-secondary">Phone Pay</span>
                                            @break

                                            @case('4')
                                                <span class="badge bg-warning">Amazon Pay</span>
                                            @break

                                            @case('5')
                                                <span class="badge bg-dark">Card</span>
                                            @break

                                            @case('6')
                                                <span class="badge bg-danger">Cheque</span>
                                            @break

                                            @case('6')
                                                <span class="badge bg-danger">Apple Pay</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->traDate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Transection No.</th>
                                <th>Title</th>
                                <th>Entity</th>
                                <th>Amount</th>
                                <th>Transection Type</th>
                                <th>Method</th>
                                <th>Date Time</th>
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
                    <h3 class="card-title">Final Report</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Total Amount</strong></td>
                                <td class="w-25">
                                    <center><strong>-</strong></center>
                                </td>
                                <td>
                                    <center><strong>-</strong></center>
                                </td>
                                <td><strong>{{ $report['totalAmount'] }}</strong>&nbsp&nbsp<i class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>1.</strong></td>
                                <td>Balance</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width: {{ ($report['balance'] * 100) / $report['totalAmount'] }}%"></div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-success">{{ ($report['balance'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $report['balance'] }}</strong>&nbsp&nbsp<i class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>2.</strong></td>
                                <td>Spent</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                            style="width: {{ ($report['spent'] * 100) / $report['totalAmount'] }}%"></div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-danger">{{ ($report['spent'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $report['spent'] }}</strong>&nbsp&nbsp<i class="fas fa-rupee-sign"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Report Code -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Balance Entity Report</strong></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Transection Type</strong></td>
                                <td class="w-25">
                                    <center><strong>-</strong></center>
                                </td>
                                <td>
                                    <center><strong>-</strong></center>
                                </td>
                                <td><strong>Amount</strong></td>
                            </tr>
                        </thead>
                        <tbody id="tblBody">
                            <tr id="row_1">
                                <td><strong>1.</strong></td>
                                <td>Cash</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                            style="width: {{ ($balReport['cash'] * 100) / $report['totalAmount'] }}%">
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-info">{{ ($balReport['cash'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $balReport['cash'] == null ? 0 : $balReport['cash'] }}</strong>&nbsp&nbsp<i
                                        class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr id="row_2">
                                <td><strong>2.</strong></td>
                                <td>Paytm</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                            style="width: {{ ($balReport['paytm'] * 100) / $report['totalAmount'] }}%">
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-primary">{{ ($balReport['paytm'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $balReport['paytm'] == null ? 0 : $balReport['paytm'] }}</strong>&nbsp&nbsp<i
                                        class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr id="row_3">
                                <td><strong>3.</strong></td>
                                <td>Google Pay</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width: {{ ($balReport['gpay'] * 100) / $report['totalAmount'] }}%">
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-success">{{ ($balReport['gpay'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $balReport['gpay'] == null ? 0 : $balReport['gpay'] }}</strong>&nbsp&nbsp<i
                                        class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr id="row_4">
                                <td><strong>4.</strong></td>
                                <td>Phone Pay</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"
                                            style="width: {{ ($balReport['phonepay'] * 100) / $report['totalAmount'] }}%">
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-secondary">{{ ($balReport['phonepay'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $balReport['phonepay'] == null ? 0 : $balReport['phonepay'] }}</strong>&nbsp&nbsp<i
                                        class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr id="row_5">
                                <td><strong>5.</strong></td>
                                <td>Amazon Pay</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                            style="width: {{ ($balReport['amazonpay'] * 100) / $report['totalAmount'] }}%">
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-warning">{{ ($balReport['amazonpay'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $balReport['amazonpay'] == null ? 0 : $balReport['amazonpay'] }}</strong>&nbsp&nbsp<i
                                        class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr id="row_6">
                                <td><strong>6.</strong></td>
                                <td>Card</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-dark" role="progressbar"
                                            style="width: {{ ($balReport['card'] * 100) / $report['totalAmount'] }}%">
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-dark">{{ ($balReport['card'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $balReport['card'] == null ? 0 : $balReport['card'] }}</strong>&nbsp&nbsp<i
                                        class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                            <tr id="row_7">
                                <td><strong>7.</strong></td>
                                <td>Cheque</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                            style="width: {{ ($balReport['cheque'] * 100) / $report['totalAmount'] }}%">
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-danger">{{ ($balReport['cheque'] * 100) / $report['totalAmount'] }}%</span>
                                </td>
                                <td><strong>{{ $balReport['cheque'] == null ? 0 : $balReport['cheque'] }}</strong>&nbsp&nbsp<i
                                        class="fas fa-rupee-sign"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Account Report</strong></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Account Type</strong></td>
                                <td class="w-25">
                                    <center><strong>Credit</strong></center>
                                </td>
                                <td>
                                    <center><strong>Debit</strong></center>
                                </td>
                                <td>
                                    <center><strong>Balance</strong></center>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>1.</strong></td>
                                <td>Cash</td>
                                <td>{{ $accountReport['cashCredit'] }}</td>
                                <td>{{ $accountReport['cashDebit'] }}</td>
                                <td>{{ $accountReport['cashBalance'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>2.</strong></td>
                                <td>Paytm Wallet</td>
                                <td>{{ $accountReport['pwCredit'] }}</td>
                                <td>{{ $accountReport['pwDebit'] }}</td>
                                <td>{{ $accountReport['pwBalance'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>3.</strong></td>
                                <td>Paytm Payments Bank</td>
                                <td>{{ $accountReport['ppbCredit'] }}</td>
                                <td>{{ $accountReport['ppbDebit'] }}</td>
                                <td>{{ $accountReport['ppbBalance'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
