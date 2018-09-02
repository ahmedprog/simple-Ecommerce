
{{--@extends('cpanel.layouts.index') --}}
@extends('cpanel.layouts.app')

@section('content')
            <div class="row">
               <div class="col-lg-12">
                  <div class=" animated ">
                     <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add">&nbsp;&nbsp;Add New Category <i class="fa fa-plus-circle" aria-hidden="true" style="padding-left: 22px"></i></button>

                           <div class="box  box-solid">
                              <div class=" box-header">
                                 <br>
                                 <h3 class="title m-t-sm ">Categories</h3>
                              </div>
                              <div class="box-body">
                                 <div class="table-responsive">
                                    <table class="text-center table table-striped table-bordered table-hover" >
                                       <thead>
                                          <tr class="frist">
                                             <th>ID</th>
                                             <th>Category Name</th>
                                             <th>Actions</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       @foreach($categories as $categorie )
                                          <tr class="gradeX">
                                             <td>{{$categorie->id}}</td>
                                             <td class="center">{{$categorie->catName}} </td>
                                             <td>
                                                 <button class="btn btn-danger sendIdDelete btn-xs "
                                                         {{--data-toggle="modal" data-target="#confirm-delete"--}}
                                                         data-id='{{$categorie->id}}' >
                                                <span class="glyphicon glyphicon-trash"></span>
                                                </button>&nbsp;&nbsp;
                                                <button class="btn btn-primary sendId btn-xs" data-toggle="modal" data-id='{{$categorie->id}}' data-category="{{$categorie->catName}}" data-target="#edit"><span class="glyphicon glyphicon-edit"></span></button>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                     <div class="text-center">
                                         {{$categories->links()}}
                                     </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Modal -->
                           <div id="add" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h3 class="title">Add New Category</h3>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row m-t-xs">
                                          <div class="col-sm-12 ">
                                          {{--  Add new Categories here  --}}
                                          {!! Form::open([  'action' => 'CategoriesController@store','method' => 'POST','role'=>'form']) !!}                                                
                                               
                                                <div class="form-group{{ $errors->has('CatName') ? ' has-error' : '' }}">
                                                      
                                                      <input type="text" name="catName" placeholder="Category Name" class="form-control" value="{{ old('CatName') }}" >
                                                </div>
                                                      @if ($errors->has('catName'))
                                                            <span class="help-block text-danger">
                                                                  <strong >{{ $errors->first('catName') }}</strong>
                                                            </span>
                                                      @endif
                                                <button class="btn btn-sm btn-warning btn-block m-t-n-xs" type="submit"><strong>Submit</strong></button>

                                             {!! Form::close() !!}

                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end modal -->
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
                                       <div class="">
                                          {{--  Edit Categories  --}}
                                          {!! Form::open([ 'method' => 'PUT','role'=>'form' ,'id'=>'EditCategory']) !!}                                                
                                                      <div class="form-group">
                                                            <input type="text" id="valCategory"  value="" name="upCatName" class="form-control">
                                                      </div>
                                                         @if ($errors->has('upCatName'))
                                                            <span class="help-block text-danger">
                                                                  <strong>{{ $errors->first('upCatName') }}</strong>
                                                            </span>
                                                      @endif
                                                            <button class="btn btn-sm btn-warning btn-block m-t-n-xs" type="submit"><strong>Submit</strong></button>
                                          {!! Form::close() !!}
                                          
                                
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
{!! Form::open(['method'=>'POST' ,'id'=>'DeleteCategory', 'class'=>"hidden"]) !!}
{{ Form::hidden('_method','DELETE') }}
{!! Form::close() !!}
@endsection


@section('js')

     {{--  //if has error in add Categories show model with error    --}}
        @if (session('open'))
        <div id="dom-target" style="display: none;">{{session('open')}}</div>
        <script>
  var div = document.getElementById("dom-target");
    var myData = div.textContent;
            $('#'+myData).modal('show');
        </script>
        @endif


<script > 
// pass Category id when show model 
$(document).on("click", ".sendId", function () {
    var myId = $(this).data('id');
    var mycategory = $(this).data('category');
    $("#EditCategory").attr("action", "/admin/"+myId);
    $("#valCategory").attr("value", mycategory);
    
    // it is superfluous to have to manually call the modal.required autofocus
    // $('#addBookDialog').modal('show');
});

$(document).on("click", ".sendIdDelete", function () {
    var myId = $(this).data('id');

    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result){
        if (result.value) {
        $("#DeleteCategory").attr("action", "/admin/"+myId).submit();
        swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    }
});


//     ,function (){
//
// });

})
</script>
@endsection
