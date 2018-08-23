

@extends('layouts.index') 
@section('content')

 <!-- ==========Cover ========== -->
   <section id="home" name="home">
      <div id="headerwrap" style="background: url({{ asset('img/header-bg.jpg') }}); background-repeat: no-repeat; background-size: cover;">
         <div class= "container">
            <div class="logo">
               <img src="{{ asset('img/logo.png') }}">
            </div>
            <br>
            <div class="row circle">
               <div class="col-md-3  col-xs-12 center-block col-md-offset-3">
                  <div id="talkbubble" class="center-block text-center">
                     <div class="block-content">
                        <span class="regular">Status:&nbsp;&nbsp;</span> <span class="bold">{{ Auth::user()->status->statusName }}</span>&nbsp;&nbsp;<span ><i class="fa fa-circle active-color" aria-hidden="true"></i></span><br>
                        <span class="regular">Expiry date:&nbsp;&nbsp;</span> <span class="bold">3/5/2018</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-3  col-xs-12 center-block col-md-offset-3">
                  <div id="talkbubble" class="center-block text-center">
                     <div class="block-content">
                        <span class="bold">Current Level</span><br>
                        <span class="bold font-43">{{$carrntLevel}}</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-3  col-xs-12 center-block col-md-offset-3">
                  <div id="talkbubble" class="center-block text-center">
                     <div class="block-content">
                        <span class="bold">Latest Commession</span><br>
                        <span class="regular">in:&nbsp;&nbsp;</span> <span class="bold">{{$latestin}} EGP</span><br>
                        <span class="regular">out:&nbsp;&nbsp;</span> <span class="bold">{{$latestout}} EGP</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /container -->
      </div>
      <!-- /headerwrap -->
   </section>
   <section id="table">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 m-t-20">
               <h3 class="bold">Latest Sign up</h3>
               <table class="table table-bordered text-center">
                  <thead>
                     <tr>
                        <th class="home-color text-center">Date</th>
                        <th class="home-color text-center">Account Name</th>
                        <th class="home-color text-center">ID</th>
                        <th class="home-color text-center">Signed up from</th>
                        <th class="home-color text-center">Refeler ID</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($latestSignup as  $user)
                     <tr>

                        <td >{{$user->created_at}}</td>
                        <td >{{$user->name}}</td>
                        <td >{{$user->id}}</td>
                        <td >{{$user->parent->name}}</td>
                        <td >{{$user->refeler_id}}</td>
                        
                     </tr>
                     @endforeach
                     
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>


   @endsection