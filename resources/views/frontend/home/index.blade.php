@extends('frontend.master')
@section('title')
Home Page
@endsection
@section('content')

    @include('frontend.include.banner')

    </br></br></br></br>
    <hr>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*"><h2><strong><marquee>Online Day Care Centre</marquee></strong></h2></li>
                        <hr>

                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            @foreach($products as $pro)
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
        </div>
    </section>
    <!-- Product Section End -->

 


@endsection