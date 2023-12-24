@php
    $i = 0;
@endphp
@if (Auth::user()->cart)
    @foreach ($cart as $cart1)
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ $cart1 }}
            <button type="button" class="btn-close" data-id="{{ $i }}"></button>
        </div>
        @php
            $i++;
        @endphp
    @endforeach
@endif

<script type="text/javascript">
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
</script>
