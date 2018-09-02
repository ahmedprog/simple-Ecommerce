 @extends('cpanel.layouts.app')
 @section('content')
<div class="row">
    <div class="col-lg-12">
        <div class=" ">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Header -->
                    <div class="box">
                        <!-- Button to Add new Product -->
                        <div class="box-header">
                            <button class="btn btn-info btn-rounded"  onclick="addForm()" >
                                Add New Product
                                <i class="fa fa-plus-circle" aria-hidden="true" style="padding-left: 22px"></i>
                            </button>
                            <br>

                            <div class="row">
                                <!-- Page title -->
                                <div class="col-md-3">
                                    <h3 class="title m-t-sm">Products</h3>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <!-- All products here -->
                        <div class="box-body">

                            <div class="table-responsive">
                                <table style="width: 100%;" id="products-table" class="table table-striped table-bordered table-hover " >
                                    <thead>
                                        <tr class="frist">
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Price After Discount</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add new Product -->
                    @include('cpanel.inc.modalAddProducts')
                </div>
            </div>
            <!-- end modal -->
            <!-- Modal edit -->
            {{--@include('cpanel.inc.modalEditProducts')--}}
        </div>
    </div>
</div>
<!-- end modal -->
<!-- delete Modal-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel" style="padding-left: 14px;">Confirm Delete</h4>
            </div>
            <div class="modal-body m-t">
                <p>Do you want to delete this Product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                {!! Form::open(['method'=>'POST' ,'id'=>'DeleteProduct']) !!} {{ Form::hidden('_method','DELETE') }}
                <button type="submit" class="btn btn-danger btn-ok ">Delete</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>

@endsection @section('js')
 <script>

     const inputFile=`<div class="fileinput fileinput-new" data-provides="fileinput"><span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image[]"></span>
                                </span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                            </div><br>`;

$(function () {
    $('.summernote').summernote();

    $('.input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    $('#clickAdd').click(function (e) {
        $('#addnewImageHere').append(inputFile);
    });

});






     var table = $('#products-table').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('api.products') }}",
         columns: [
             {data: 'name', name: 'name'},
             {data: 'price', name: 'price'},
             {data: 'offer', name: 'offer'},
             {data: 'categories_id', name: 'categories_id'},
             // {data: 'show_photo', name: 'show_photo'},
             {data: 'action', name: 'action', orderable: false, searchable: false}
         ]
     });
     function addForm() {
         save_method = "add";
         $('#addnewImageHere').html(inputFile);
         $('#formAdd input[name=_method]').val('POST');
         $('#add-modal-form').modal('show');
         $('#formAdd')[0].reset();
         $('.modal-title').text('Add New Product');
     }

     function editForm(id) {
         save_method = 'edit';
         $('#addnewImageHere').html(inputFile);
         $('#formAdd input[name=_method]').val('PATCH');
         $('#formAdd')[0].reset();
         $.ajax({
             url: "{{ url('/admin/products') }}" + '/' + id + "/edit",
             type: "GET",
             dataType: "JSON",
             success: function(data) {
                 $('#add-modal-form').modal('show');
                 $('.modal-title').text('Edit Product');

                 $('#productID').val(data.id);
                 $('#name').val(data.name);
                 $('#offer').val(data.offer);
                 $('#price').val(data.price);
                 $('#categoryID').val(data.categories_id);
                 $("#description").summernote("code", data.description);
             },
             error : function() {
                 alert("Nothing Data");
             }
         });
     }

     $(function(){

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $('#formAdd').validator().on('submit', function (e) {
             if (!e.isDefaultPrevented()){
        console.log(new FormData($("#formAdd")));
            console.log($('#formAdd').serialize());
                 let url,
                     id= $('#productID').val();
                 if (save_method == 'add') url = "{{ url('/admin/products') }}";
                 else url = "{{ url('/admin/products') . '/' }}" + id ;
                 $.ajax({
                     url : url,
                     type : "POST",
                     // data : $('#formAdd').serialize(),
                    data: new FormData($("#formAdd")[0]),
                    contentType: false,
                    processData: false,
                     success : function(data) {
                         if (data.errors){
                             let errorsHtml='';
                             $.each( data.errors, function( key, value ) {
                                 errorsHtml += value[0] + '<br>';
                             });
                             $('#errorsMSG').html(errorsHtml).addClass('text-center text-danger');
                             setTimeout(function() {
                                 $('#errorsMSG').text('');
                             }, 5000);
                         }else{
                             $('#add-modal-form').modal('hide');
                             table.ajax.reload();
                             swal({
                                 title: 'Success!',
                                 text: data.message,
                                 type: 'success',
                                 timer: '1500'
                             });
                         }

                     },
                     error : function(data){
                         swal({
                             title: 'Oops...',
                             text: data.message,
                             type: 'error',
                             timer: '1500'
                         })
                     }
                 });
                 return false;
             }
         });
     });

     function deleteProduct(id){
         var csrf_token = $('meta[name="csrf-token"]').attr('content');
         swal({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             type: 'warning',
             showCancelButton: true,
             cancelButtonColor: '#d33',
             confirmButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         },function () {
             $.ajax({
                 url : "{{ url('/admin/products')}}" + '/' + id,
                 type : "POST",
                 data : {'_method' : 'DELETE', '_token' : csrf_token},
                 success : function(data) {
                     table.ajax.reload();
                     swal({
                         title: 'Success!',
                         text: data.message,
                         type: 'success',
                         timer: '1500'
                     })
                 },
                 error : function () {
                     swal({
                         title: 'Oops...',
                         text: data.message,
                         type: 'error',
                         timer: '1500'
                     })
                 }
             });
         });
     }

    // pass product id when show delete model
    $(document).on("click", ".sendIdDelete", function () {
        var myId = $(this).data('id');
        $("#DeleteProduct").attr("action", "/admin/products/" + myId);
    })
</script>
@endsection