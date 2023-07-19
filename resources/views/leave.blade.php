@extends('layout')

@section('activeLeave')
    active
@endsection

@section('pageTitle')
    Add Transection
@endsection

@section('content')
    <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">New Transection</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/leave/submit" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Leave Reason</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="lReason"
                            placeholder="Enter Leave Reason">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="lsDate">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">End Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword2" name="leDate">
                    </div>
                    <div class="form-group">
                        <label for="type">Leave Type</label><br>
                        <div class="btn-group btn-group-toggle w-50" data-toggle="buttons">
                            <label class="btn bg-danger active">
                                <input type="radio" name="lType" id="option_b1" value="0" autocomplete="off"
                                    checked=""> Full Day
                            </label>
                            <label class="btn bg-success">
                                <input type="radio" name="lType" id="option_b2" value="1" autocomplete="off">
                                Half Day
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
