@foreach ($products as $product)
    <div class="col-4">
        <!-- Card with an image on top -->
        <div class="card">
            <img src="{{ $product->imgProduct }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->nameProduct }}</h5>
                <p class="card-text">{{ number_format($product->priceProduct) }} VND</p>
                <button class="add_cart card-text btn btn-primary" data-id="{{ $product->idProduct }}">Thêm
                    vào giỏ hàng</button>
            </div>
        </div><!-- End Card with an image on top -->
    </div>
@endforeach

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
</script>
