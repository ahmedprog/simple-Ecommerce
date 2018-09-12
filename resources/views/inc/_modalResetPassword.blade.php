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
