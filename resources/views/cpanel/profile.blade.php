@extends('cpanel.layouts.index') @section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3 class="title m-t-sm" style="margin-left: -2px">Profile</h3>
                                </div>
                                <div class="col-lg-12">
                                    <ol class="breadcrumb">
                                        <li>
                                            <a href="user.html">Users</a>
                                        </li>
                                        <li class="active">
                                            <strong>Profile</strong>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="tabs-container m-t-lg profile">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab-1" aria-expanded="false"> Personal Info</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" aria-expanded="true">Cash Out</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-3" aria-expanded="true">Cash In</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h4> Name:</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4> {{$user->name}}</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-2">
                                                    <h4> Email:</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4> {{$user->email}}</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-2">
                                                    <h4>Address: </h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4>{{$user->address}} </h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-2">
                                                    <h4> Gov ID:</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4>{{$user->govid}}</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-2">
                                                    <h4> Mobile:</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4>{{$user->mobile}}</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-2">
                                                    <h4> Refeler ID:</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4>{{$user->refeler_id}}</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-2">
                                                    <h4> Status:</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4>{{$user->status->statusName}}</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-2">
                                                    <h4> Current Level</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <h4>{{$carrntLevel}}</h4>
                                                </div>
                                                <div class="clearfix"></div>


                                            </div>

                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane ">
                                        <div class="panel-body">
                                            <table class="table table-bordered">
                                                <thead class="cash-in">
                       
                                                    <tr>
                                                           <th class="bold text-center">Date</th>
                                                            <th class="bold text-center">Amount</th>
                                                            <th class="bold text-center">Product Name</th>                           
                                                            <th class="bold text-center">Transfered by</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cashOuts as $CashOut)
                                                    <tr>
                                                        <td >{{$CashOut->created_at->format('d/m/Y')}}</td>
                                                        <td >{{$CashOut->amount}} EGP</td>
                                                        <td >{{$CashOut->product->name}}</td>
                                                        <td >{{$CashOut->transferedby}}</td>

                                                    </tr>
                                                @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab-3" class="tab-pane ">
                                        <div class="panel-body">
                                            <table class="table table-bordered">
                                                <thead class="cash-in">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Transfered By</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$user->commession->updated_at->format('d-m-Y')}}</td>
                                                        <td>{{$user->commession->commession}} EGP</td>
                                                        <td>Commessions</td>
                                                    </tr>
                                                    <tr>
                                                        <td>22-2-2022</td>
                                                        <td>333 EGP</td>
                                                        <td>vodafone cash</td>
                                                    </tr>
                                                    

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection @section('js')

<script>
    $(document).ready(function () {

        $('.summernote').summernote();

        $('.input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

    });
</script>
<!-- Page-Level Scripts -->

@endsection