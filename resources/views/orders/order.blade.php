@extends('welcome')
@section('contents')
    <div class="pagetitle">
        <h1>Quản lí đơn hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lí đơn hàng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <div class="d-flex " style="height: 65px">
                <div class="p-2 flex-grow-1">

                </div>
                <div class="p-2" style="margin-top: 5px">
                    <a href="{{ route('orders.create') }}"><button type="button" class="btn btn-primary">THÊM ĐƠN HÀNG </button></a>
                </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ngày đặt</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{ number_format($order->sumPrice) }} VND</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        @php
                            $i += 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
            {{ $orders->links() }}
        </div>
    </div>
@endsection
