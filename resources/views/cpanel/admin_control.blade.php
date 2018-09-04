 @extends('cpanel.layouts.app') @section('content')

<div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-md-3">
              <h3 class="title m-t-sm">Admin Control </h3>
            </div>
          </div>
        </div>
        <div class="box-body">
            <form role="form" action="{{ route('admin.update') }}" method="post">
              {{ csrf_field() }}
              {{ Form::hidden('_method','put') }}
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="e-mail">Email address</label>
                <input type="email" id="e-mail" class="form-control" name="email" value="{{$admin->email}}" aria-describedby="emailHelp" placeholder="Enter email">
                 @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('Current') ? ' has-error' : '' }}">
                <label for="current">Current </label>
                <input type="password" id="current" name="Current" class="form-control" placeholder="Password">
                 @if ($errors->has('Current'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Current') }}</strong>
                        </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">New</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">

                 @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="re-password">Re-type new </label>
                <input type="password" id="re-password" class="form-control" name="password_confirmation" placeholder="Password">
                 @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                  @endif
              </div>
              <button type="submit" class="btn btn-primary">Save Change</button>
            </form>
        </div>
      </div>
    </div>
</div>



@endsection