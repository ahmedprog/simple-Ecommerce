@extends('layouts.index')

@section('content')

   <!-- ==========Cover ========== -->
       <section id="home" name="home">
         <div id="headerwrap" style="background: url(img/background-levels.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class= "container">
               <div class="logo">
                  <img src="img/logo.png">
               </div>
               <br>
               <div class="row circle">
                 
                  
                  <div class="col-md-4  col-xs-12 center-block">
                    <!-- table -->
                    <div class="table-responsive">          
                       <table class="table level">
                         <tdead>
                           <tr>
                             <td>Direct Level</td>
                             <td class="num-two bold">5</td>
                             <td class="num-three bold">
                             @if(isset($coutner['direct-level'])){{$coutner['direct-level']}} @endif</td>
                           </tr>
                         </tdead>
                         <tbody>
                           <tr>
                             <td> Level 2</td>
                             <td class="num-two bold">25</td>
                             <td class="num-three bold">@if(isset($coutner[2])){{$coutner[2]}} @endif</td>
                           </tr>
                           <tr>
                             <td> Level 3</td>
                             <td class="num-two bold">125</td>
                             <td class="num-three bold">@if(isset($coutner[3])){{$coutner[3]}} @endif</td>
                           </tr>
                           <tr>
                             <td> Level 4</td>
                             <td class="num-two bold">625</td>
                             <td class="num-three bold">@if(isset($coutner[4])){{$coutner[4]}} @endif</td>
                           </tr>
                           <tr>
                             <td> Level 5</td>
                             <td class="num-two bold">3125</td>
                             <td class="num-three bold">@if(isset($coutner[5])){{$coutner[5]}} @endif</td>
                           </tr>
                           <tr>
                             <td> Level 6</td>
                             <td class="num-two bold">15625</td>
                             <td class="num-three bold">@if(isset($coutner[6])){{$coutner[6]}} @endif</td>
                           </tr>
                            <tr>
                             <td> Level 7</td>
                             <td class="num-two bold">78125</td>
                             <td class="num-three bold">@if(isset($coutner[7])){{$coutner[7]}} @endif</td>
                           </tr>
                           <tr>
                             <td> Level 8</td>
                             <td class="num-two bold">390625</td>
                             <td class="num-three bold">@if(isset($coutner[8])){{$coutner[8]}} @endif</td>
                           </tr>
                           
                         </tbody>
                       </table>
                       </div>
                    <!--  -->
                    <div class="col-md-12">
                       <div class="square">
                          <div class="row">
                             <div class="col-md-1">
                                 <div class="one"></div>
                             </div>
                             <div class="col-md-10 pull-left">
                                  <div class="pull-left white-color regular">
                                     Achieved number
                                  </div>
                             </div>
                            
                             
                          </div>
                          
                       </div>
                    </div>
                  </div>
               </div>
            </div>
            <!-- /container -->
         </div>
         <!-- /headerwrap -->
      </section>
      
@endsection