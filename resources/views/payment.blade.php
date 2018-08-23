@extends('layouts.index')

@section('content')
<!-- ==========Cover ========== -->
       <section id="home" name="home">
         <div id="headerwrap" style="background: url(img/background-payment.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class= "container">
               <div class="logo">
                  <img src="img/logo.png">
               </div>
               <br>
               <div class="row">
                 <div class="col-md-2">
                   <div class="namee bold">
                     Direct 
                   </div>
                 </div>
                 <div class="col-md-5">
                   <div class="moka">
                   <div class="row">
                     <div class="col-xs-6">
                        <p class="title bold">Accounts</p>
                        <p class="num regular">{{$direct['accounts']}}</p>
                     </div>
                     <div class="col-xs-6">
                       <p class="title bold"> Products</p>
                        <p class="num regular">{{$direct['products']}}</p>
                     </div>
                     <br>
                     <div class="clearfix m-b-10"></div>
                     <div class="col-xs-6">
                        <p class="title bold"> Payments</p>
                        <p class="num regular">{{$direct['payments']}} EGP</p>
                     </div>
                     <div class="col-xs-6">
                       <p class="title bold"> Commessions</p>
                        <p class="num regular">{{$direct['commessions']}} EGP</p>
                     </div>
                   </div>
                 </div>
                 </div>
               </div><!-- end of row -->
               <div class="row m-t-10 m-b-10">
                 <div class="col-md-2">
                   <div class="namee bold">
                     In-Direct  
                   </div>
                 </div>
                 <div class="col-md-5">
                   <div class="moka">
                   <div class="row">
                     <div class="col-xs-6">
                        <p class="title bold">Accounts</p>
                        <p class="num regular">{{$indirect['accounts']}}</p>
                     </div>
                     <div class="col-xs-6">
                       <p class="title bold"> Products</p>
                        <p class="num regular">{{$indirect['products']}}</p>
                     </div>
                     <br>
                     <div class="clearfix m-b-10"></div>
                     <div class="col-xs-6">
                        <p class="title bold"> Payments</p>
                        <p class="num regular">{{$indirect['payments']}} EGP</p>
                     </div>
                     <div class="col-xs-6">
                       <p class="title bold"> Commessions</p>
                        <p class="num regular">{{$indirect['commessions']}} EGP</p>
                     </div>
                   </div>
                 </div>
                 </div>
               </div><!-- end of row -->
             
            </div>
            <!-- /container -->
         </div>
         <!-- /headerwrap -->
      </section>
      <section>
        <div class="container m-t-20">
  
  
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="bold">
          Cash out
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div id="table" class="panel-body">
          <table class="table table-bordered text-center">
                     <thead>
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
                           <td >{{$CashOut->amount}}</td>
                           <td >{{$CashOut->product->name}}</td>
                           <td >{{$CashOut->transferedby}}</td>
                           
                        </tr>
                        @endforeach
                     </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title bold">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" >
          Cash in
        </a>
      </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body" id="table">
          <button class="btn btn-success pull-right m-b-10">Request</button>
          <table class="table table-bordered text-center">
                     <thead>
                        <tr>
                           <th class="bold text-center">Date</th>
                           <th class="bold text-center">Amount</th>
                           <th class="bold text-center">Transfered by</th>
                           
                        </tr>
                     </thead>
                     <tbody>
                       
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                           
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                           
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                          
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                           
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                          
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                           
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                           
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                          
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                           
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                          
                        </tr>
                        <tr>
                           <td ></td>
                           <td ></td>
                           <td ></td>
                          
                        </tr>
                     </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
</div>
      </section>
      

@endsection