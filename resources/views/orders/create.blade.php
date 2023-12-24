@extends('welcome')
@section('contents')
    <div class="pagetitle">
        <h1>Tạo đơn hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tạo đơn hàng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row align-items-top">
            <div class="col-9 row">
                <div class="p-2 flex-grow-1 col-12">
                    <div class="search-bar">
                        <form class="search-form d-flex align-items-center" method="GET" action="#"
                            id="searchProduct">
                            <input type="text" name="search" placeholder="Search" title="Enter search keyword"
                                style="font-size: 14px;
                          color: #012970;
                          border: 1px solid rgba(1, 41, 112, 0.2);
                          padding: 7px 38px 7px 8px;
                          border-radius: 3px;
                          transition: 0.3s;
                          width: 40%;">
                            <button type="submit" title="Search"
                                style="border: 0;
                            padding: 0;
                            margin-left: -30px;
                            background: none;"><i
                                    class="bi bi-search" id="submit"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-12 row" id="listSearchOrder">
                    @foreach ($products as $product)
                        <div class="col-4">
                            <!-- Card with an image on top -->
                            <div class="card">
                                <img src="{{ $product->imgProduct }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->nameProduct }}</h5>
                                    <p class="card-text">{{ number_format($product->priceProduct) }} VND</p>
                                    <button class="add_cart card-text btn btn-primary"
                                        data-id="{{ $product->idProduct }}">Thêm
                                        vào giỏ hàng</button>
                                </div>
                            </div><!-- End Card with an image on top -->
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="col-3 card">
                <a href="{{ route('orders.checkout') }}" style="margin-top: 10px; color: #fff" class="btn btn-primary">
                    Tiến hành thanh toán
                </a>
                <div class="card-body">

                    <h5 class="card-title">Danh sách sản phẩm</h5>
                    <div id="test">
                        @php
                            $i = 0;
                        @endphp
                        @if (Auth::user()->cart)
                            @foreach ($carts as $cart)
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ $cart }}
                                    <button type="button" class="btn-close" data-id="{{ $i }}"></button>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        @endif


                    </div>

                </div>

            </div>

        </div>
    </section>

    <script type="text/javascript">
        $(".add_cart").click(function(e) {
            e.preventDefault();

            let productId = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/add_cart/aa",
                method: "POST",
                data: {
                    product_id: productId
                },
                success: function(result) {
                    $('#test').html(result);
                }
            });
        });

        $(".btn-close").click(function(e) {
            e.preventDefault();

            let productId = $(this).data('id');
            console.log(productId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/delete_order/dd",
                method: "POST",
                data: {
                    product_id: productId
                },
                success: function(result) {
                    $('#test').html(result);
                }
            });
        });

        $("#submit").click(function(e) {

            e.preventDefault();

            $.ajax({
                url: "/search_product_order",
                method: "GET",
                data: $('#searchProduct').serialize(),
                success: function(result) {
                    $('#listSearchOrder').html(result);
                }
            });
        });
    </script>
@endsection
