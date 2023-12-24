@extends('welcome')
@section('contents')
<div class="">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tạo doanh thu</h5>
            <!-- General Form Elements -->
            <form method="POST" action="{{route('revenue.store')}}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tháng doanh thu</label>
                    <div class="col-sm-10">
                        <input type="text" id="creNamePro" class="form-control" name="month" placeholder="09/2023 => 92023">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tạo</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
</div>
@endsection
