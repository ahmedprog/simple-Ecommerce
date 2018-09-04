 @extends('cpanel.layouts.app') @section('content')

<div class="row">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-md-3">
                  <h3 class="title m-t-sm">Users List</h3>
                </div>
                <div class="col-md-3 form-group pull-right"  >
                    <select  class="form-control" id="filtration" >
                        <option value="" disabled selected hidden>Filtration</option>
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}"
                            {{isset($filterId)&& $filterId ==$status->id ?'selected':''}}
                            >{{$status->statusName}}</option>
                        @endforeach
                    </select>
                </div>

              </div>
                <div class="clearfix"></div>

            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                  <thead>
                    <tr class="frist">
                      <th>ID</th>
                      <th>Name </th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $i=> $user)
                    <tr class="gradeX">
                      <td>{{++$i}}</td>
                      <td class="center">{{$user->name}}</td>
                      <td>{{$user->mobile}}</td>
                      <td>
                        <span  class='label  @switch($user->status->statusName)
                              @case('pending')
                                  label-warning
                                  @break
                              @case('blocked')
                                  label-danger
                                  @break
                                     @case('level complet')
                                  label-success
                                  @break
                              @case('active')
                                  label-primary
                                   @break
                          @endswitch'>
                        {{$user->status->statusName}}</span>
                      </td>
                      <td>
                        <button class="btn btn-danger sendIdDelete btn-xs " data-toggle="modal" data-target="#confirm-delete" data-id='{{$user->id}}' >
                          <span class="glyphicon glyphicon-trash">
                          </button>&nbsp;&nbsp;
                      
                        <button class="btn btn-primary senduserdata btn-xs" data-toggle="modal" data-id='{{$user->id}}' data-uname="{{$user->name}}" data-mobile="{{$user->mobile}}" data-address="{{$user->address}}" data-toggle="tooltip" title="Edit" data-target="#edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </button>
                       
                        &nbsp;
                        <a href="/admin/profile/{{$user->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" title="
                                             View Profile">
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                  <div class="text-center">{{ $users->links() }}</div>
              </div>
            </div>
          </div>






          <!-- Modal -->
          <div id="edit" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3 class="title">Edit</h3>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 ">
                      <form role="form" method="post" id="EditUser">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <input type="text" name="name" id="uName" value="" required class="form-control">
                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                          <input type="number" name="mobile" id="mobile" value="" class="form-control" required>
                          @if ($errors->has('mobile'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('mobile') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                          <input type="type" value="" id="address" name="address" class="form-control" required >
                          @if ($errors->has('address'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group">

                          <select name="status_id" class="form-control" id="sel1">
                          @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->statusName}}</option>
                          
                          @endforeach
                          </select>
                        </div>
                        {{ csrf_field() }}
                        {{ Form::hidden('_method','put') }}
                      <button class="btn btn-sm btn-warning btn-block m-t-n-xs" type="submit">
                        <strong>Submit</strong>
                      </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <!-- delete Modal-->
         <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h4 class="modal-title" id="myModalLabel" style="padding-left: 14px;">Confirm Delete</h4>
                </div>
                <div class="modal-body m-t">
                   <p>Do you want to delete this User?</p>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>                                    
                      {!! Form::open(['method'=>'POST' ,'id'=>'Deleteuser']) !!}
                      {{ Form::hidden('_method','DELETE') }}
                   <button type="submit" class="btn btn-danger btn-ok ">Delete</button>
                       {!! Form::close() !!}   
                </div>
             </div>
          </div>
       </div>
        </div>
      </div>


@endsection @section('js')

<script>
  $(document).ready(function () {

    $('.summernote').summernote();

    $('.input-group.date').datepicker({
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      calendarWeeks: true,
      autoclose: true
    });
});
      $(document).on("click", ".senduserdata", function () {
        var myId = $(this).data('id');
        var name = $(this).data('uname');
        var mobile = $(this).data('mobile');
        var address = $(this).data('address');
        $("#EditUser").attr("action", "/admin/users/" + myId);
        $("#uName").attr("value", name);
        $("#mobile").attr("value", mobile);
        $("#address").attr("value", address);

    });

    $(document).on("click", ".sendIdDelete", function () {
        var myId = $(this).data('id');
        $("#Deleteuser").attr("action", "/admin/users/"+myId);
    });
    $('#filtration').on('change',function () {
        let targetUrl="{{url('admin/users')}}/"+this.value;
        window.location.href =targetUrl;
    })
  
</script>

<!-- Page-Level Scripts -->
@endsection