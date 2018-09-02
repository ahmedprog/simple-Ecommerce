<!-- Modal Add new Product -->
<div id="add-modal-form" class="modal fade product" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="title modal-title"></h3>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div id="errorsMSG"></div>
                        <!--  -->
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#ProductInfo"> Product info</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#Images"> Images</a>
                                    </li>
                                </ul>
                                <form action='' method='POST' id="formAdd"  data-toggle="validator"  enctype='multipart/form-data'>
                                    {{ csrf_field() }} {{method_field('')}}
                                    <input type="hidden" name="id" id="productID">
                                    <div class="tab-content">
                                        <div id="ProductInfo" class="tab-pane active">
                                            <div class="panel-body">
                                                <fieldset class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Category:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="categories_id" id="categoryID" required>
                                                                @foreach($categories as $category)
                                                                    <option value='{{$category->id}}'>{{$category->catName}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Name:</label>
                                                        <div class="col-sm-10">
                                                            <input id="name" type="text" class="form-control" placeholder="Product name" name="name"  required >
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Price:</label>
                                                        <div class="col-sm-10">
                                                            <input id="price" type="text" class="form-control" placeholder="$160.00" name="price"  required>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Price After Discound:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="$160.00" name="offer" id="offer" required>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Description:</label>
                                                        <div class="col-sm-10">
                                                            <textarea  id="description" name="description" placeholder='Enter your Description here'
                                                                      class='summernote form-control ' required></textarea>
                                                            <span class="help-block with-errors"></span>

                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div id="Images" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        Image 1
                                                        <small>(main image)</small>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Select file</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="image[main]" ></span>
                                                            <span class="help-block with-errors"></span>

                                                            </span>
                                                            <span class="fileinput-filename"></span>
                                                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-3">
                                                        Images
                                                    </div>
                                                    <div class="col-md-9">

                                                        <div id="addnewImageHere">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Select file</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="image[]"></span>
                                                                </span>
                                                                <span class="fileinput-filename"></span>
                                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <button   class="btn btn-sm btn-primary  m-t-n-xs" type="button" id="clickAdd">
                                                            <i class="fa fa-plus-circle"></i>
                                                            Add Image
                                                        </button>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </div>

                                            </div>
                                        </div>
                                        <hr>

                                        <button class="btn btn-sm btn-warning btn-block m-t-n-xs" type="submit" id="submitAdd">
                                            <strong>Submit</strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
