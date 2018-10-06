@extends('layouts.index') @section('css')
<link href="{{ asset('magiczoomplus/magiczoomplus.css') }}" rel="stylesheet" type="text/css" media="screen" /> @endsection @section('content')


<!-- ==========Cover ========== -->
<section id="home" name="home">
      <div id="headerwrap" style="background: url(img/product_page.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class="container products">
                  <div class="logo">
                        <img src="{{ asset('img/logo.png') }}">
                        <span class="white-color bold  h2">Easy Make Money & Easy Shopping</span>

                  </div>
                  <br>
                  <div class="">
                        <h3 class="bold ">Get an amazing</h3>
                        <h1 class="bold">Products</h1>
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
                              <a href="{{url('products?category='.$category->id)}}">
                                    <span>
                                          <i class="fa fa-square" aria-hidden="true"></i>&nbsp;</span>
                                    <span class="filter regular">{{$category->catName}}</span>
                              </a>
                        </div>
                        @endforeach
                  </div>
                  <div class="col-md-10 m-t-20 m-b-40 rightside">

                        <div class="row select-product m-b-20">
                            @if($products->count())
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
                                          <div id="carousel_{{$product->id}}" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                      @foreach(explode(' | ',$product->images->image )  as $photo)

                                                            <div class="item {{preg_match('/^main_[0-9]+/', $photo)? ' active ' : '' }}">
                                                                  <img src="{{url('/img/products_image').'/'.$photo}}" style="width:100%;">
                                                            </div>
                                                      @endforeach

                                                </div>

                                                <!-- Controls -->
                                                <a class="left carousel-control" href="#carousel_{{$product->id}}" role="button" data-slide="prev">
                                                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                      <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel_{{$product->id}}" role="button" data-slide="next">
                                                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                      <span class="sr-only">Next</span>
                                                </a>
                                          </div>
                                          <p class="description regular m-t-10">
                                                {!!$product->description!!}
                                          </p>
                                          <span class="cancel bold">{{$product->price}} EGP</span>
                                          <span class="price bold">{{$product->offer}} EGP</span>
                                    </a>
                                    <button class="btn btn-block btn-search m-t-5  " onclick="makeOrder('{{$product->id}}')" data-id='{{$product->id}}'>
                                          <span>
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; &nbsp;</span>
                                          Order</button>
                              </div>
                              @endforeach
                            @else
                            <p class="text-center bg-danger"> There is no Product</p>
                            @endif
                        </div>
                  </div>
            </div>
      </div>
</section>
@endsection @section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js'></script>
<script>



    function makeOrder(orderId) {
        swal({
            title: 'Do You need this product ?',
            confirmButtonText:  'Yes',
            cancelButtonText:  'Noا',
            showCancelButton: true,
            showCloseButton: true,
        });
        console.log(orderId);
    }


      $(document).ready(function () {
            $('#ex1').zoom();
            $('#ex2').zoom();
            $('#ex3').zoom();
            $('#ex4').zoom();
            $('#ex5').zoom();
            $('#ex6').zoom();
            
    
      });
       $(document).on("click", ".sendProductdata", function () {
           $("#carou1, .smcarousel").html('');
           var myId = $(this).data('id');
        var name = $(this).data('name');
        var price = $(this).data('price');
        var offer = $(this).data('offer');
        var desc = $(this).data('des');
         var images = $(this).data('images');
        var catID = $(this).data('productcatid');
      var image = images.split(" | ");
      const regex = /^main_.[0-9]*/g;
for (i = 0; i < image.length; i++) {
    var e ="<div class='item ' id='getactive"+i+"'><span class='zoom' id='ex"+(i+1)+"'>"+
        "<img src='/img/products_image/"+image[i]+"' class='img-responsive imagepro' width='555' height='320' /> "+
        "</span> </div>";
    $("#carou1").append(e);
    var sm = " <li data-target='#carousel-custom' data-slide-to='"+i+"' class='getactive"+i+"'>" +
        "<img src='/img/products_image/"+image[i]+"'/></li>";
    $(".smcarousel").append(sm);

    const regex = /^main_.[0-9]*/g;
    var m;
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