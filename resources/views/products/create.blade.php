@extends('welcome')
@section('contents')
<div class="">
    <div class="row">
        <div class="col-12">
            @if ($errord = session()->get('errors'))
                <ul>
                    @foreach ($errors->messages() as $key => $error)
                        <li>
                            <i style="color: red">{{$error[0]}}</i>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Thêm sản phẩm</h5>

            <!-- General Form Elements -->
            <form method="POST" action="{{route('products.store')}}"
            enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" id="creNamePro" class="form-control" name="nameProduct" >
                        <div id="count" style="width: 60px;
                        float: right;">
                            <span id="current_count">0</span>
                            <span id="maximum_count">/ 55</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Hãng</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="brand">
                            <option selected>Chọn hãng</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Mã sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="idProduct">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="imgProduct">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Giá</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="priceProduct">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Số lượng</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="quantityProduct">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
</div>
@endsection
