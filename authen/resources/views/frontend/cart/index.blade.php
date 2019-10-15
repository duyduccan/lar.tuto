@extends('frontend.layouts.fashion')
@section('title')
    Giỏ hàng
@endsection
@section('content')
    <style type="text/css">
        #custom-cart .banner-bottom, .team, .checkout, .additional_info, .team-bottom, .single, .mail, .special-deals, .about, .faq, .typo, .new-products, .banner-bottom1, .top-brands, .dresses, .w3l_related_products {
            padding: 5em 0;
        }
        #custom-cart .checkout h3 {
            font-size: 1em !important;
            color: #212121;
            text-transform: uppercase;
            margin: 0 0 3em;
        }
        #custom-cart .checkout h3 span {
            color: #ff9b05;
        }
        #custom-cart table{
            border-color: gray;
        }
        #custom-cart table.timetable_sub {
            width: 100%;
            margin: 0 auto;
        }
        #custom-cart .timetable_sub thead {
            background: #F2F2F2;
        }
        #custom-cart .timetable_sub th:nth-child(1) {
            border-left: 1px solid #C5C5C5;
        }
        #custom-cart .timetable_sub th, .timetable_sub td {
            text-align: center;
            padding: 7px;
            font-size: 14px;
            color: #212121;
        }
        #custom-cart .timetable_sub th {
            background: none;
            color: #212121 !important;
            text-transform: capitalize;
            font-size: 13px;
            border-right: 1px solid #C5C5C5;
            border-top: 1px solid #C5C5C5;
        }
        #custom-cart tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        #custom-cart .close1, .close2, .close3 {
            cursor: pointer;
            position: static !important;
            -webkit-transition: color 0.2s ease-in-out;
            -moz-transition: color 0.2s ease-in-out;
            -o-transition: color 0.2s ease-in-out;
            transition: color 0.2s ease-in-out;
        }
        #custom-cart .timetable_sub td {
            border: 1px solid #CDCDCD;
        }
        #custom-cart .checkout-left {
            margin: 2em 0 0;
        }
        #custom-cart .checkout-left-basket {
            float: left;
            width: 25%;
        }
        #custom-cart .checkout-left-basket h4 {
            padding: 1em;
            background: #ff9b05;
            font-size: 1.1em;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin: 0 0 1em;
        }
        #custom-cart .checkout-left-basket ul li {
            list-style-type: none;
            margin-bottom: 1em;
            font-size: 14px;
            color: #999;
        }
        #custom-cart .checkout-left-basket ul li span {
            float: right;
        }
        #custom-cart .checkout-left-basket ul li:last-child {
            font-size: 1em;
            color: #212121;
            font-weight: 600;
            padding: 1em 0;
            border-top: 1px solid #DDD;
            border-bottom: 1px solid #DDD;
            margin: 2em 0 0;
        }
        #custom-cart .checkout-right-basket {
            float: right;
            margin: 8em 0 0 0em;
        }
        #custom-cart .checkout-right-basket a {
            padding: 10px 30px;
            color: #fff;
            font-size: 1em;
            background: #212121;
            text-decoration: none;
        }
        #custom-cart
        #custom-cart
        #custom-cart
        #custom-cart
        #custom-cart

    </style>
    <div id="custom-cart">
        <div class="checkout">
            <div class="container">
                <h3>Your shopping cart contains: <span>3 Products</span></h3>
                <!---728x90--->

                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Giá SP</th>
                            <th>Giá SL</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($cart_products as $product)
                            <tr class="rem{{ $i }}">
                                <td class="invert">{{ $i }}</td>
                                <?php
                                $product_id = $product->id;
                                $images = (isset($products[$product_id]->images) && $products[$product_id]->images) ? json_decode($products[$product_id]->images) : array();
                                ?>
                                <td class="invert-image"><a href="{{ url('shop/product/'.$product_id) }}">
                                        @foreach($images as $image)
                                            <img src="{{ asset($image) }}" style="max-width:150px;" alt=" " class="img-responsive">
                                            @break;
                                        @endforeach
                                    </a></td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">{{ $product->quantity }}</div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{ $product->name }}</td>
                                <td class="invert">VND {{ $product->price }}</td>
                                <td class="invert">VND {{ $product->price * $product->quantity}}</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1"> Remove </div>
                                    </div>
                                    <script>$(document).ready(function(c) {
                                            $('.close1').on('click', function(c){
                                                $('.rem1').fadeOut('slow', function(c){
                                                    $('.rem1').remove();
                                                });
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        <!--quantity-->
                        <script>
                            $('.value-plus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                divUpd.text(newVal);
                            });

                            $('.value-minus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                if(newVal>=1) divUpd.text(newVal);
                            });
                        </script>
                        <!--quantity-->
                        </tbody></table>
                </div>
                <div class="checkout-left">
                    <div class="checkout-left-basket">
                        <h4>Continue to basket</h4>
                        <ul>
                            @foreach($cart_products as $product)
                                <li>{{ $product->name }} <i>-</i> <span>VND {{ $product->price *  $product->quantity  }} </span></li>
                            @endforeach
                            <li>Total <i>-</i> <span>$697.00</span></li>
                        </ul>
                    </div>
                    <div class="checkout-right-basket">
                        <a href="products.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>

@endsection    