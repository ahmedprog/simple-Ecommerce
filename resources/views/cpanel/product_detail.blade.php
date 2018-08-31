
@extends('cpanel.layouts.index') 
@section('content')


<div class="row" style="margin-left: 10px">
                 <div class="col-lg-10">
                <h2>E-commerce product detail</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/products">Products</a>
                    </li>
                    <li class="active">
                        <strong>Product detail</strong>
                    </li>
                </ol>
            </div>
            <div class="col-md-2">
               
            </div>

              </div>
               <hr>
            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">
                                    <!--  -->
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                            <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                        @foreach($photos as $photo)

                                                <div class="item {{ preg_match('/^mena_[0-9]+/', $photo)? ' active' : '' }}">
                                                    <img src="{{url('/img/products_image').'/'.$photo}}"  style="width:100%;">
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <!--  -->


                                </div>
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        {{$product->name}}
                                    </h2>
                                 
                                    <div class="m-t-md">
                                        <h2 class="product-main-price">${{$product->price}} <small class="text-muted" style="text-decoration: line-through;">${{$product->offer}}</small> </h2>
                                    </div>
                                    <hr>

                                    <h4>Product description</h4>

                                    <div class="small text-muted">
                                        {!!$product->description!!}
                                    </div>
                                    <dl class="small m-t-md">
                                        <dt>Category</dt>
                                        <dd>{{$product->categories->catName}}</dd>
                                       
                                        
                                       
                                    </dl>

                                </div>
                            </div>

                        </div>
                       
                    </div>

                </div>
            </div>


   @endsection
   @section('js')

       <script src="{{ asset('cpanel/js/plugins/slick/slick.min.js') }}"></script>


     <script>
    $(document).ready(function(){


        $('.product-images').slick({
            dots: true
        });

    });

</script>

   @endsection
