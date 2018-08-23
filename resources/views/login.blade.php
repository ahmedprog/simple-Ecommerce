 @include('layouts.inc.head')

<body>
    <section id="login">
        <div class="background-login">
            <div class="container">
            @include('layouts.inc.messages')

                <div class="col-md-7 ">
                    <h1 class="bold white-color text-center">Start making money </h1>
                    <p class="white-color text-center">Please Login or
                        <a data-toggle="modal" data-target="#register">Register</a>
                    </p>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
{{--Start   login Form  --}}
                            <form  role="form" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email"placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                                    <input id="password"  placeholder="Password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            
                            </div>

                                <div class="form-group">
                                        <div class="checkbox i-checks">
                                            <input type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                                            <span class="white-color">Remember Me</span>
                                            <span class="pull-right">
                                                <a class="color-white" data-toggle="modal" data-target="#forget">
                                                    Forgot Password
                                                </a>
                                            </span>
                                        </div>
                                </div>
                        
                                    <button type="submit" name="submit"  value="login"  class="btn btn-white btn-block full-width m-b">
                                        Login
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class=" img-responsive" src="img/login.png">
                </div>
            </div>

        </div>
    </section>
    <!-- media -->
    <div id="forget" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body m-t-lg">
                    <div class="row mod-login">
                        <div class="col-sm-12 ">
                            <h3 class="bold m-b-20">You can reset your password here.</h3>
                           {{--  reset password  --}}
                           
                            <form role="form" method="POST" >
                                {{ csrf_field() }}

                                <!--  -->
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" placeholder=" E-mail" name="email" value="{{ old('email') }}" required class="form-control">
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                                </div>
                                <!--  -->
                            <button name="submit" value="password.request" class="btn btn-sm btn-sublogin btn-block m-t-n-xs" type="submit">
                                <strong>Reset Password</strong>
                            </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- media -->
    <div id="register" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body m-t-lg">
                    <div class="row mod-login">
                        <div class="col-md-12">


                            <h3 class="bold m-b-20">Register Now</h3>


                        </div>
                        <!-- Form Area -->
                        <div class="contact-form">
                            <!-- Form Register -->
                            {{--    --}}
                            <form id="contact-us" method="post" action="register">
                                <!-- Left Inputs -->
                                <div class="col-md-6 ">

                                    {{ csrf_field() }}
                                    <!--  -->
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                     <input  type="text"  placeholder=" Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                     @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                        <input type="number" name="mobile" value="{{ old('mobile') }}" required  placeholder="Mobile" class="form-control">
                                     @if ($errors->has('mobile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                    
                                    </div>
                                    <!--  -->




                                </div>
                                <!-- End Left Inputs -->
                                <!-- Right Inputs -->
                                <div class="col-md-6">

                                    <!--  -->
                                    <div class="form-group{{ $errors->has('govid') ? ' has-error' : '' }}">
                                        <input type="number" placeholder="Gov ID" class="form-control" name="govid" value="{{ old('govid') }}" required>
                                         @if ($errors->has('govid'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('govid') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('refeler_id') ? ' has-error' : '' }}">
                                        <input type="number" placeholder="Refeler ID" name="refeler_id" class="form-control"  value="{{ old('refeler_id') }}" >
                                        @if ($errors->has('refeler_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('refeler_id') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                </div>
                                <!-- End Right Inputs -->
                                <div class="col-md-12">

                                
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <input type="text" placeholder="Address" class="form-control" name="address" value="{{ old('address') }}" required>
                                           @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="mail" placeholder="E-Mail" class="form-control" name="email" value="{{ old('email') }}" required>
                                           @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                </div>
                                <!-- End Right Inputs -->
                                <!-- Left Inputs -->
                                <div class="col-md-6 ">

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" placeholder="Password" name="password" class="form-control"  required>
                                          @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                        @endif
                                    </div>


                                </div>
                                <!-- End Left Inputs -->
                                <!-- Right Inputs -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" placeholder="Re-Password"  name="password_confirmation" class="form-control"  required>
                                    </div>

                                </div>
                                <!-- End Right Inputs -->
                                <!-- Bottom Submit -->
                                <div class="col-md-12">
                                    <button name="submit" value="register" class="btn btn-sm btn-sublogin btn-block m-t-n-xs" type="submit">
                                        <strong>Submit</strong>
                                    </button>
                                </div>
                                <!-- Clear -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
        <!-- iCheck -->
        <script src="js/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
                @if (session('open'))
        <div id="dom-target" style="display: none;">{{session('open')}}</div>
        <script>
  var div = document.getElementById("dom-target");
    var myData = div.textContent;
            $('#'+myData).modal('show');
        </script>
        @endif


        @if(!empty($open) && $open == 'register')
        <script>
        $(function() {
            $('#register').modal('show');
        });
        </script>
        @elseif(!empty($open) && $open == 'forget')
         <script>
        $(function() {
            $('#forget').modal('show');
        });
        </script>
        @endif

</body>

</html>