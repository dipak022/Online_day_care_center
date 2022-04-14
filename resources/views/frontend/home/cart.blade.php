@extends('frontend.master')
@section('title')
Cart Page
@endsection
@section('content')

     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="index.html">Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                <th class="product_thumb">Image</th>
                                    <th class="product_name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($cart as $row)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img style="height: 100px; width: 100px;" src="{{ asset( $row->options->image ) }}" alt="">
                                            </div>
                                        </td>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__text">
                                                <h6>{{$row->name}}</h6>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{$row->price}} TK</td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                <form method="post" action="{{ route('update.cartitem') }}">
                                                @csrf
                                                <input type="hidden" name="productid" value="{{ $row->rowId }}">
                                                <input min="1" max="50"  name="qty" value="{{ $row->qty }}" type="number">
                                                <button  type="submit"  class="btn btn-primary float-right">update</button>
                                            </form>
                                                </div>
                                            </div>

                                           
                                        </td>
                                        <td >{{ $row->price*$row->qty }} TK</td>
                                        
                                        <td class="cart__close"><a href="{{ url('remove/cart/'.$row->rowId) }}"><i class="fa fa-close"></i></a></td>
                                    </tr>
                               @endforeach
                              
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{route('home')}}">Continue Shopping</a>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{ Cart::Subtotal() }} TK</span></li>
                            <li>Total <span>{{ Cart::Subtotal() }} TK</span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection