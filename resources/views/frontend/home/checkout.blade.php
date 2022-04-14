@extends('frontend.master')
@section('title')
Checkout Page
@endsection
@section('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="index.html">Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('checkout.store') }}" method="post">
                 @csrf
                 <input type="hidden" name="total" value="{{ Cart::Subtotal()  }}" >
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name">
                                    </div>
                                </div>
                            </div>
                           


                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
                                
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="county">
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>
                          
                            
                            <div class="checkout__input__checkbox">
                               
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery." name="note">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">List <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($cart as $row)
                                        <li>{{$row->qty}} . {{$row->name}}l <span>{{$row->price * $row->qty}} TK</span></li>
                                    @endforeach
                                       
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>{{ Cart::Subtotal() }} TK</span></li>
                                    <li>Total <span>{{ Cart::Subtotal() }} TK</span></li>
                                </ul>
                                
                               
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash Payment
                                        <input type="radio" id="payment" name="payment_type" type="radio" data-target="createp_account" vlaue="cash" require>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection