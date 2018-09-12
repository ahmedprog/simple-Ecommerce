 @include('layouts.inc.head')

<body>
    <section id="login">
        <div class="background-login">
            <div class="container">
            @include('layouts.inc.messages')

                <div class="col-md-7 ">
                    <h1 class="bold white-color text-center">Easy Life Shopping</h1>
                    <p class="white-color text-center">Please Login or
                        <a data-toggle="modal" data-target="#register"><b> Register</b></a>
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
                        
                                    <button type="submit" name="submit"  value="login"  class="btn  btn-block btn-success">
                                        Login
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class=" img-responsive" src="{{url('img/login.png')}}">
                    <h2 class="bold white-color text-center">Easy ways to make money</h2>
                </div>
            </div>

        </div>
    </section>
    <!-- media -->
    <!-- media -->
    @include('inc._modalResetPassword')
    @include('inc._modalRegister')

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



    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#registerForm').submit(function (e){
            e.preventDefault();
            $.ajax({
                url:"{{url('register')}}",
                type : "POST",
                data:$('#registerForm').serialize(),
                success : function(data) {
                    if (data.errors){
                        let errorsHtml='';
                        $.each( data.errors, function( key, value ) {
                            errorsHtml += value[0] + '<br>';
                        });
                        $('#errorsMSG').html(errorsHtml).addClass('text-center text-danger');
                        setTimeout(function() {
                            $('#errorsMSG').text('');
                        }, 15000);
                    }else{
                        window.location="{{url('/')}}";
                    }

                },
                error : function(){
                alert('oops something went wrong ')
                }
            });

            return false;
        });
    </script>


</body>

</html>