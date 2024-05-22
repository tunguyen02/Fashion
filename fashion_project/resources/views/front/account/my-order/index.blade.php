@extends('front.layout.master')

@section('title', 'My Order')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./"><i class="fa fa-home"></i> Home</a>
                    <span>My Order</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- MyOrder Section Begin -->
<div class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                        <th>Image</th>
                        <th class="p-id">ID</th>
                        <th>Products</th>
                        <th>Total</th>
                        <th>Details</th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="cart-pic first-row">
                                <img width="150px"
                                     src="front/img/products/{{ $order->orderDetails[0]->products->productImages[0]->path }}" alt="">
                            </td>
                            <td class="first-row">#{{ $order->id }}</td>
                            <td class="cart-title first-row" style="text-align: center">
                                <h5>
                                    {{ $order->orderDetails[0]->products->name }}
                                    @if(count($order->orderDetails) > 1)
                                    (and {{ count($order->orderDetails) }} other products)
                                    @endif
                                </h5>
                            </td>
                            <td class="total-price first-row">
                                ${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}
                            </td>
                            <td class="first-row">
                                <a href="./account/my-order/{{ $order->id }}" class="btn">Details</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MyOrder Section End -->
@endsection
