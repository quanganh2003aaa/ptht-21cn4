@extends('welcome')
@section('contents')
    <div class="card">
        <div class="card-body">
            <div class="d-flex " style="height: 65px">
                <div class="p-2 flex-grow-1">
                    <h5 class="card-title">Danh sách nhà cung cấp</h5>
                </div>
                <div class="p-2" style="margin-top: 5px">
                    <a href="{{route('brands.create')}}"><button type="button" class="btn btn-primary">+</button></a>
                </div>
            </div>

            <!-- Default Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã</th>
                        <th scope="col">Tên nhà cung cấp</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <th scope="row">{{ $brand->id }}</th>
                            <td>{{ $brand->brand }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{route('brands.edit', $brand)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                    Sửa
                                </a>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{route('brands.delete', $brand)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        Xóa
                                    </button>
                                </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection
