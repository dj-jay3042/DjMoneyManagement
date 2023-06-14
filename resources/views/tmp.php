<!-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Custom Report</h3>
                </div>
                <div class="card-header">
                    <form action="" method="get">
                        <table class="w-100">
                            <tr>
                                <td><strong>From :</strong></td>
                                <td><strong>To :</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" name="dateFrom">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="dateTo">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-block btn-success" id="btnReport">Show
                                        Report</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Title</strong></td>
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
                                <td>Total Amount</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                            style="width: 100%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">100%</span></td>
                                <td><strong>{{ $custReport["custTotalAmount"] }}</strong>&nbsp&nbsp<i class="fas fa-rupee-sign"></i></td>
                            </tr>
                            <tr id="row_2">
                                <td><strong>2.</strong></td>
                                <td>Balance</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width: {{ ($custReport["custBalance"] * 100) / 1/*(($custReport["custTotalAmount"] == 0) ? (1) : ($custReport["custTotalAmount"]))*/ }}%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">{{ ($custReport["custBalance"] * 100) / 1/*($custReport["custTotalAmount"] == 0) ? (1) : ($custReport["custTotalAmount"])*/ }}%</span>
                                </td>
                                <td><strong>{{ $custReport["custBalance"] }}</strong>&nbsp&nbsp<i class="fas fa-rupee-sign"></i></td>
                            </tr>
                            <tr id="row_3">
                                <td><strong>3.</strong></td>
                                <td>Spent</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                            style="width: {{ ($custReport["custSpent"] * 100) / 1/*($custReport["custTotalAmount"] == 0) ? (1) : ($custReport["custTotalAmount"])*/ }}%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">{{ ($custReport["custSpent"] * 100) / 1/*($custReport["custTotalAmount"] == 0) ? (1) : ($custReport["custTotalAmount"])*/ }}%</span></td>
                                <td><strong>{{ $custReport["custSpent"] }}</strong>&nbsp&nbsp<i class="fas fa-rupee-sign"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->

    <!-- $results = DB::select("
        SELECT
            (SELECT SUM(traAmount) FROM TblTransection WHERE traType = 1 AND Date(traDate) >= '" . $from . "' AND Date(traDate) <= '" . $to . "') as totalAmount,
            (SELECT SUM(traAmount) FROM TblTransection WHERE traType = 0 AND Date(traDate) >= '" . $from . "' AND Date(traDate) <= '" . $to . "') as spent,
            (SELECT SUM(traAmount) FROM TblTransection WHERE traType = 1 AND Date(traDate) >= '" . $from . "' AND Date(traDate) <= '" . $to . "') - (SELECT SUM(traAmount) FROM TblTransection WHERE traType = 0 AND Date(traDate) >= '" . $from . "' AND Date(traDate) <= '" . $to . "') as balance
        FROM
            TblTransection
        LIMIT 1
        ");
        $custTotalAmount = $results[0]->totalAmount;
        $custSpent = $results[0]->spent;
        $custBalance = $results[0]->balance;
        $custReport = ["custTotalAmount" => $custTotalAmount, "custSpent" => $custSpent, "custBalance" => $custBalance]; -->
