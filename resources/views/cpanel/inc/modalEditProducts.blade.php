<!-- Modal edit -->
<div id="edit" class="modal fade product" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="title">Edit Product</h3>
            </div>
            <div class="modal-body">
                <div class="row m-t-sm">
                    <div class="row">
                        <!--  -->
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab-11"> Product info</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab-44"> Images</a>
                                    </li>
                                </ul>
                                <form action='' id="EditProduct" method='post' enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    {{ Form::hidden('_method','put') }}
                                    <div class="tab-content">
                                        <div id="tab-11" class="tab-pane active">
                                            <div class="panel-body">
                                                <fieldset class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Category:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="categories_id" id="sel1">
                                                                @foreach($categories as $category)
                                                                    <option value='{{$category->id}}'>{{$category->catName}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label class="col-sm-2 control-label">Name:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Product name" id='prName' name="name" value="" required> @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                        <label class="col-sm-2 control-label">Price:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="$160.00" name="price"id='prPrice'  value="" required>
                                                        </div>
                                                        @if ($errors->has('price'))
                                                            <span class="help-block">
                                                                        <strong>{{ $errors->first('price') }}</strong>
                                                                    </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group{{ $errors->has('offer') ? ' has-error' : '' }}">
                                                        <label class="col-sm-2 control-label">Price After Discound:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="$160.00" id='prOffer' name="offer" value="" required>
                                                        </div>
                                                        @if ($errors->has('offer'))
                                                            <span class="help-block">
                                                                        <strong>{{ $errors->first('offer') }}</strong>
                                                                    </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                        <label class="col-sm-2 control-label">Description:</label>
                                                        <div class="col-sm-10">
                                                            {{Form::textarea('description', '', ['placeholder'=>'Enter your Description here', 'class'=>'form-control prDesc summernote','id'=>'articleed-ckeditor','required'])}}
                                                        </div>
                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                                        <strong>{{ $errors->first('description') }}</strong>
                                                                    </span>
                                                        @endif
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div id="tab-44" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        Image 1
                                                        <small>(main image)</small>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                            <span class="fileinput-new">Select file</span>
                                                                            <span class="fileinput-exists">Change</span>
                                                                            <input type="file" name="image[mena]">
                                                                        </span>
                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-3">
                                                        Image2
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                            <span class="fileinput-new">Select file</span>
                                                                            <span class="fileinput-exists">Change</span>
                                                                            <input type="file" name="image[]">
                                                                        </span>
                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        Image3
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                            <span class="fileinput-new">Select file</span>
                                                                            <span class="fileinput-exists">Change</span>
                                                                            <input type="file" name="image[]">
                                                                        </span>
                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        Image4
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                            <span class="fileinput-new">Select file</span>
                                                                            <span class="fileinput-exists">Change</span>
                                                                            <input type="file" name="image[]">
                                                                        </span>
                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-warning btn-block m-t-n-xs" type="submit">
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