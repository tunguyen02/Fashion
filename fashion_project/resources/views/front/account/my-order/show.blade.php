@extends('front.layout.master')

@section('title', 'Order Details')

@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="./account/my-order">My Order</a>
                        <span>Order Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->


    <!-- Shopping Cart Section Begin-->
    <div class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a  class="content-btn">
                                Order ID:
                                <b>#{{ $order-> id }}</b>
                            </a>
                        </div>
                        <h4>Billing Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name <span>*</span></label>
                                <input disabled type="text" value="{{ $order->first_name }}" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name <span>*</span></label>
                                <input disabled type="text" value="{{ $order->last_name }}" id="last">
                            </div>

                            <div class="col-lg-12">
                                <label for="cun">Country <span>*</span></label>
                                <input disabled type="text" value="{{ $order->country }}" id="cun">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address <span>*</span></label>
                                <input disabled type="text" value="{{ $order->street_address }}" id="street" class="street-first">
                            </div>

                            <div class="col-lg-12">
                                <label for="town">Town/ City <span>*</span></label>
                                <input disabled type="text" value="{{ $order->town_city }}" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address <span>*</span></label>
                                <input disabled type="email" value="{{$order->email }}" id="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone <span>*</span></label>
                                <input disabled type="text" value="{{ $order->phone }}" id="phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a  class="content-btn">
                                Status:
                                <b>{{ \App\Utilities\Constant::$order_status[$order->status] }}</b>
                            </a>
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    @foreach($order->orderDetails as $orderDetail)
                                    <li class="fw-normal">
                                        {{ $orderDetail->products->name }} x {{ $orderDetail->qty }}
                                        <span>${{ $orderDetail->total }}</span>
                                    </li>
                                    @endforeach

                                    <li class="total-price">
                                        Total
                                        <span>${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}</span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay later
                                            <input disabled type="radio" id="pc-check" name="payment_type"
                                                value="pay_later" {{ $order->payment_type == 'pay_later' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Online payment
                                            <input disabled type="radio" name="payment_type" value="online_payment"
                                                id="pc-paypal" {{ $order->payment_type == 'online_payment' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Shopping Cart Section End-->
@endsection

