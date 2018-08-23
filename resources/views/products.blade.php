@extends('layouts.index') @section('css')
<link href="{{ asset('magiczoomplus/magiczoomplus.css') }}" rel="stylesheet" type="text/css" media="screen" /> @endsection @section('content')


<!-- ==========Cover ========== -->
<section id="home" name="home">
      <div id="headerwrap" style="background: url(img/product_page.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class="container products">
                  <div class="logo">
                        <img src="img/logo.png">
                  </div>
                  <br>
                  <div class="row " style="text-align: left;">
                        <div class="">
                              <div class="col-md-3 col-md-offset-1">
                                    <h3 class="bold ">Get an amazing</h3>
                                    <h1 class="bold">Products</h1>
                              </div>
                              <div class="col-md-4 col-md-offset-4">
                                    <p class="regular">Selection are all the exclusive content designed by our team. Additionally, if you are
                                          subscribed to our Premium account, when using this vector, you can avoid crediting
                                          the image </p>
                              </div>
                        </div>
                  </div>
            </div>
            <!-- /container -->
      </div>
      <!-- /headerwrap -->
</section>
<section id="filter">
      <div class="container">
            <div class="row">
                  <div class="col-md-2 m-t-20 leftside">
                        <h2 class="bold">Categories</h2>
                        @foreach($categories as $category)
                        <div class="block">
                              <a href="#{{$category->id}}">
                                    <span>
                                          <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
                                    <span class="filter regular">{{$category->catName}}</span>
                              </a>
                        </div>
                        @endforeach
                  </div>
                  <div class="col-md-10 m-t-20 m-b-40 rightside">
                        <div class="row inp">
                              <div class="col-md-7">
                                    <div class="row">
                                          <div class="col-md-9">
                                                <div class="form-group">
                                                      <input type="text" placeholder="What do you want ?" class="form-control" id="usr">
                                                </div>
                                          </div>
                                          <div class="col-md-3">
                                                <button class="btn btn-search btn-block">Search</button>
                                          </div>
                                    </div>
                              </div>
                              <div class="col-md-5">
                                    <form class="form-inline inline">
                                          <div class="form-group  has-feedback">
                                                <label for="" class="regular">Price from&nbsp;&nbsp;</label>
                                                <input type="Number" class="form-control" id="">

                                          </div>
                                          <div class="form-group  has-feedback">
                                                <label for="" class="regular">&nbsp;to&nbsp;</label>
                                                <input type="Number" class="form-control" id="">

                                          </div>
                                          <div class="form-group has-error has-feedback">


                                                <button class="btn btn-search btn-block">Filter</button>
                                          </div>
                                    </form>
                              </div>
                        </div>
                        <div class="row select-product m-b-20">
                              @foreach($products as $product)
                              <div class="col-md-4">
                                    <a data-toggle="modal" class="sendProductdata" 
                                    data-name="{{$product->name}}"
                                    data-des="{{$product->description}}"
                                    data-price="{{$product->price}}"
                                    data-offer="{{$product->offer}}"
                                    data-images="{{$product->images->image}}"
                                    data-id='{{$product->id}}'
                                     data-target="#myModal">
                                          <p class="title bold">{{$product->name}}</p>

                                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner">
                                                      @foreach(explode(' | ',$product->images->image ) as $photo)
                                                      <div class="item {{ preg_match('/^mena_[0-9]+/', $photo)? ' active' : '' }}">
                                                            <img src="/img/products_image/{{$photo}}" alt="" style="width:100%;">
                                                      </div>
                                                      @endforeach
                                                </div>
                                                <!-- Left and right controls -->
                                                <a class="left carousel-control arrow" href="#myCarousel" data-slide="prev">
                                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                                      <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control arrow" href="#myCarousel" data-slide="next">
                                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                                      <span class="sr-only">Next</span>
                                                </a>
                                          </div>
                                          <!--  -->
                                          <p class="description regular m-t-10">
                                                {!!$product->description!!}
                                          </p>
                                          <span class="cancel bold">{{$product->price}} EGP</span>
                                          <span class="price bold">{{$product->offer}} EGP</span>
                                    </a>
                                    <button class="btn btn-block btn-search m-t-5 sendProductId " data-toggle="modal" data-target="#confirm-order" data-id='{{$product->id}}'>
                                          <span>
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; &nbsp;</span>
                                          Order</button>
                              </div>
                              @endforeach




                        </div>
                  </div>
                  <!-- Order Modal-->
                  <div class="modal fade" id="confirm-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title" id="myModalLabel" style="padding-left: 14px;">Confirm Order</h4>
                                    </div>
                                    <div class="modal-body m-t">
                                          <p>Do you want to Order this Product?</p>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn  pull-left" data-dismiss="modal">Cancel</button>
                                          {!! Form::open(['method'=>'POST' ,'id'=>'OrederProduct']) !!} 
                                          {{ csrf_field() }}                                          
                                          <button type="submit" class="btn btn-danger btn-ok ">Order</button>
                                          {!! Form::close() !!}
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- Modal More detail -->
                  <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">

                                    <div class="modal-body">
                                          <!--  -->
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                                          <h3 class="bold m-b-20" id="prName"></h3>
                                          <div class="preview col">
                                                <!--  -->
                                                <div class="row">
                                                      <div class="col-xs-12">
                                                            <div id='carousel-custom' class='carousel slide product_details' data-ride='carousel'>
                                                                  <div class='carousel-outer'>
                                                                        <!-- me art lab slider -->
                                                                        <div class='carousel-inner ' id='carou1'>
                                                                             
                                                                              

                                                                        </div>

                                                                        <!-- sag sol -->

                                                                  </div>

                                                                  <!-- thumb -->
                                                                  <ol class='carousel-indicators mCustomScrollbar meartlab smcarousel'>
                                                                       
                                                                  
                                                                  </ol>
                                                            </div>
                                                      </div>
                                                </div>
                                                <!--  -->
                                          </div>
                                          <!--  -->
                                          <div class="row">




                                                <div class="col-lg-12" style="padding:0; font-size:17px">
                                                      <span class="bold" style="color: #003b4f;font-size: 1.0em;">Category:</span>
                                                      <b id="catName"style="font-size: .8em;">Category 1</b>
                                                </div>

                                                <div class="col-lg-12"  style="padding:0; font-size:20px">
                                                      <span class="bold" style="color: #003b4f;font-size: 1em;">Price:</span>
                                                      <b id="prOffer" style="font-size: .8em;"></b>
                                                </div>


                                                <div class="col-lg-12" style="padding:0; font-size:20px">
                                                      <div>
                                                            <span class="bold" style="color: #003b4f;font-size: 1.0em;">Description:</span>
                                                      </div>
                                                      <b class="m-b-20" id="desc" style="font-size: .8em;"></b>
                                                </div>
                                                <div class="col-md-6 col-md-offset-3">
                                                       <button class="btn btn-block btn-search m-t-5 sendProductId " id='ordermodal' data-toggle="modal" data-target="#confirm-order" data-id=''>
                                          <span>
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; &nbsp;</span>
                                          Order</button>
                                                </div>
                                          </div>
                                    </div>

                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>
@endsection @section('js')
<script src='js/jquery.zoom.js'></script>
<script>
      $(document).ready(function () {
            $('#ex1').zoom();
            $('#ex2').zoom();
            $('#ex3').zoom();
            $('#ex4').zoom();
            $('#ex5').zoom();
            $('#ex6').zoom();
            
    
      });
       $(document).on("click", ".sendProductdata", function () {
        var myId = $(this).data('id');
        var name = $(this).data('name');
        var price = $(this).data('price');
        var offer = $(this).data('offer');
        var desc = $(this).data('des');
         var images = $(this).data('images');
        var catID = $(this).data('productcatid');
      var image = images.split(" | ");
      const regex = /^mena.[0-9]*/g;
for (i = 0; i < image.length; i++) { 
   
var e ="<div class='item ' id='getactive"+i+"'> <span class='zoom' id='ex"+(i+1)+"'><img src='/img/products_image/"+image[i]+"' class='img-responsive imagepro' width='555' height='320' /> </span> </div>";
            $("#carou1").append(e);
var sm = " <li data-target='#carousel-custom' data-slide-to='"+i+"' class='getactive"+i+"'><img src='/img/products_image/"+image[i]+"'/></li>"
            $(".smcarousel").append(sm);



const regex = /^mena.[0-9]*/g;
let m;

while ((m = regex.exec(image[i])) !== null) {
    // This is necessary to avoid infinite loops with zero-width matches
    if (m.index === regex.lastIndex) {
        regex.lastIndex++;
    }
    
    // The result can be accessed through the `m`-variable.
    m.forEach((match, groupIndex) => {
    $(".getactive"+i).addClass("active");
    $("#getactive"+i).addClass("active");

    });
}

      }
        console.log(myId);
        $("#EditProduct").attr("action", "/admin/products/" + myId);
        $("#prName").html( name);
        $("#prPrice").html( price);
        $("#prOffer").html( offer);
        $("#desc").html(desc);
         $("#ordermodal").attr("data-id", myId);
    })

      $(document).on("click", ".sendProductId", function () {
        var myId = $(this).data('id');
        $("#OrederProduct").attr("action", "/product/order/" + myId);
    });


</script>

@endsection