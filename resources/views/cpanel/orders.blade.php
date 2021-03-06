@extends('cpanel.layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
       <div class="box ">
          <div class="box-header">
             <div class="row">
                <div class="col-md-3">
                    <h3 class="title m-t-sm">Orders</h3>
                </div>
             </div>
          </div>
          <div class="box-body">
             <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" >
                   <thead>
                      <tr class="frist">
                         <th>Date</th>
                         <th>Prodact Name </th>
                         <th>Amount</th>
                         <th>User Name</th>
                      </tr>
                   </thead>
                   <tbody>
                     @foreach($orders as $order)
                      <tr class="gradeX">
                         <td>{{$order->created_at->format('d-m-Y')}}</td>
                         <td class="center"> {{$order->product->name}} </td>
                         <td>
                             {{$order->amount}}
                         </td>
                         <td>
                         {{$order->user->name}}
                         </td>
                      </tr>
                      @endforeach
                   </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
 </div>


@endsection
@section('js')

 <script>
         $(document).ready(function(){

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