@extends('welcome')
@section('contents')
    <div class="pagetitle">
        <h1>Thanh toán</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thanh toán</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách sản phẩm</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($allOrders as $order)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $order->nameProduct }}</td>
                                        <td>{{ number_format($order->priceProduct) }} VND</td>
                                        <td>{{ $order->sol }}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>


            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="padding-bottom: 5px">Tổng tiền</h5>
                        {{-- <p> --}}
                        <code style="font-size: larger;">{{ number_format($sumPrice) }} VND</code>
                        {{-- </p> --}}

                        <!-- Browser Default Validation -->
                        <form class="row g-3" style="padding-top: 10px;" action="{{ route('complete') }}" method="POST">
                            @csrf
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($allOrders as $order)
                                <input type="hidden" name="product[{{$i}}][idProduct]" value="{{ $order->idProduct }}">
                                <input type="hidden" name="product[{{$i}}][nameProduct]" value="{{ $order->nameProduct }}">
                                <input type="hidden" name="product[{{$i}}][sol]" value="{{ $order->sol }}">
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            <input type="hidden" name="sumPrice" value="{{ $sumPrice }}">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Thanh toán hoàn tất</button>
                            </div>
                        </form>
                        <!-- End Browser Default Validation -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
