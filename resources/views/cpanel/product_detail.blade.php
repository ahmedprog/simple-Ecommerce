@extends('cpanel.layouts.app')
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

                    <div class="product-detail">
                        <div class="">
                            <div class="row">
                                <div class="col-md-5">
                                    @if($photos)

                                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">

                                                @foreach($photos as $photo)

                                                <div class="item {{preg_match('/^main_[0-9]+/', $photo)? ' active ' : '' }}">
                                                    <img src="{{url('/img/products_image').'/'.$photo}}" alt="...">
                                                </div>
                                                @endforeach

                                            </div>

                                            <!-- Controls -->
                                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    @else
                                    <p> No Image for this product</p>
                                    @endif


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


@stop
   @section('js')

       {{--<script src="{{ asset('cpanel/js/plugins/slick/slick.min.js') }}"></script>--}}


     <script>
    $(document).ready(function(){



    });

</script>

   @endsection
