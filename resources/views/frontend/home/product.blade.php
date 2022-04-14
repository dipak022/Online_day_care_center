@extends('frontend.master')
@section('title')
Product Page
@endsection
@section('content')
 


     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-12">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                    @foreach($categoryproducts as $pro)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="product__item" >
                                <div class="product__item__pic set-bg" data-setbg="{{asset($pro->image)}}">
                                    <span class="label">New</span>
                                </div>
                                <div class=" text-center" style="text-align:center;">
                                    </br>
                                    <h5><b>{{$pro->name}}</b></h5>
                                    <h5 style="text-align:center;"><b> {{$pro->price}} TK</b>  </h5>
                                    <form action="{{route('add_to_cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$pro->id}}">
                                        <input type="hidden" name="qty">
                                        <input type="hidden" name="name" value="{{$pro->name}}">
                                        <input type="hidden" name="price" value="{{$pro->price}}">
                                        <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-shopping-cart" style="text-align:center;">Add To Cart</i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                       
                       
                      
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection