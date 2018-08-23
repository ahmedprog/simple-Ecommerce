<body>
  <!-- ==========End HEADER SECTION ========== -->
  <div class="button_container" id="toggle" data-toggle="modal" data-target="#myModal1">
    <span class="top"></span>
    <span class="middle"></span>
    <span class="bottom"></span>
  </div>
  <div class="modal fade menu" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body" style="background: url('img/Menu.jpg');     background-repeat: no-repeat;
                  background-size: cover;">
          <button type="button" class="close" data-dismiss="modal" style="opacity: .8; color: #fff">&times;</button>
          <h2 class="bold white-color">Site Menu</h2>
          <br>
          <div class="block">
            <a href="/">
              <span>
                <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
              <span class="filter regular">Home</span>
            </a>
          </div>
          <div class="block">
            <a id="signin">
              <span>
                <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
              <span class="filter regular">My Profile</span>
            </a>
          </div>
          <div class="block">
            <a href="products">
              <span>
                <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
              <span class="filter regular">Products</span>
            </a>
          </div>
          <div class="block">
            <a href="levels">
              <span>
                <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
              <span class="filter regular">Levels</span>
            </a>
          </div>
          <div class="block">
            <a href="tree">
              <span>
                <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
              <span class="filter regular">Tree</span>
            </a>
          </div>
          <div class="block">
            <a href="payment">
              <span>
                <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
              <span class="filter regular">Payments</span>
            </a>
          </div>
          <div class="block">
            <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
              <span class="filter regular">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="modal fade profile_model" id="test-modal" data-modal-index="1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body" style="background: url('img/profile.jpg');     background-repeat: no-repeat;
               background-size: cover;">
          <button type="button" class="close" data-dismiss="modal" style="font-size: 32px;opacity: .8; color: #fff">&times;</button>
          <h2 class="bold white-color">My Profile</h2>
          <br>
          <div class="row">
            <div class="col-xs-3">
              <p class="bold">Name:</p>
            </div>
            <div class="col-xs-9 white-color bold">
              {{Auth::user()->name}}
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-3">

              <p class=" bold">Address:</p>
            </div>
            <div class="col-xs-9 white-color bold">
              {{Auth::user()->address}}
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-3">

              <p class=" bold"> Gov ID:</p>
            </div>
            <div class="col-xs-9 white-color bold">
              342342342
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-3">

              <p class=" bold">Mobile:</p>
            </div>
            <div class="col-xs-9 white-color bold">
              {{Auth::user()->mobile}}
              <span class="btn btn-default" data-toggle="modal" data-target="#editMobile">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </span>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-3">

              <p class="bold">Refiler ID:</p>
            </div>
            <div class="col-xs-9 white-color bold">
              {{Auth::user()->refeler_id}}
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-3 bold">

              <p>Password:</p>
            </div>
            <div class="col-xs-9 white-color bold">
              **********
              <span class="btn btn-default" data-toggle="modal" data-target="#editPassword">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
        <!--  -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <div class="modal fade" id="editMobile" data-modal-index="2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row m-t-lg">
            <div class="col-sm-12 ">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h3 class="home-color bold">Edit Mobile Number</h3>
              <br>
              <form role="form" action="{{ route('mobile') }}" method="post">
                {{ csrf_field() }} {{ Form::hidden('_method','put') }}
                <div class="form-group">
                  <input type="Number" value="{{Auth::user()->mobile}}" placeholder="Edit Mobile Number" class="form-control" required name="mobile">
                </div>
                <button class="btn btn-sm btn-Lemonade btn-block m-t-n-xs" type="submit">
                  <strong>Submit</strong>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <div class="modal fade" id="editPassword">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row m-t-lg">
            <div class="col-sm-12 ">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h3 class="home-color bold">Edit Password</h3>
              <br>
              <form role="form" action="{{ route('password.update') }}" method="post">
                {{ csrf_field() }} {{ Form::hidden('_method','put') }}
                <div class="form-group{{ $errors->has('Current') ? ' has-error' : '' }}">
                  <label for="current">Current </label>
                  <input type="password" id="current" name="Current" class="form-control" placeholder="Password"> @if ($errors->has('Current'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Current') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password">New</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password"> @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <label for="re-password">Re-type new </label>
                  <input type="password" id="re-password" class="form-control" name="password_confirmation" placeholder="Password"> @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                  @endif
                </div>
                
              <button class="btn btn-sm btn-Lemonade btn-block m-t-n-xs" type="submit">
                  <strong>Submit</strong>
                </button>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

     
