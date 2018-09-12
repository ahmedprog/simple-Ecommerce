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
                        <div id="errorsMSG"></div>
                        <!-- Form Register -->
                        {{--    --}}
                        <form id="registerForm" method="post" action="register">
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
                                <button  class="btn btn-sm btn-sublogin btn-block m-t-n-xs" >
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
</div>

