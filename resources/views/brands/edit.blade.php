@extends('welcome')
@section('contents')
{{-- <div class=""> --}}
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
            <h5 class="card-title">Sửa nhà cung cấp</h5>

            <!-- General Form Elements -->
            <form method="POST" action="{{route('brands.update', $brand)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tên nhà cung cấp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="brand" value="{{$brand->brand}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sửa ngay</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
{{-- </div> --}}
@endsection
