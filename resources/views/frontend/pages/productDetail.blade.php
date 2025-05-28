@extends('frontend.layout.layout')
@section('content')
    <div class="page-container">
        <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;"
            data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
            <div class="container">
                <div class="title-wrapper">
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);"
                        data--50-top="transform: translateY(-15px);opacity:0.8;"
                        data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title"
                        class="title">{{ $product->name }}</div>
                    <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
                        <span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
                    </div>
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);"
                        data--50-top="transform: translateY(15px);opacity:0.8;"
                        data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title"
                        class="subtitle"></div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="container">
                <section class="product-single padding-top-100 padding-bottom-100">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-image">
                                <div class="product-featured-image">
                                    <div class="main-slider">
                                        <div class="slides">
                                            <div class="featured-image-item"><img src="{{ asset($product->image) }}"
                                                    alt="fooday" class="img img-responsive"></div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-summary">
                                <div class="product-title">
                                    <div class="title">{{ $product->name }}</div>
                                </div>
                                <div class="product-price">
                                    <div class="price"><span class="currency-symbol">₺</span>{{ $product->price }}</div>
                                </div>

                                <div class="product-desc">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="product-quanlity">
                                    <form class="cart-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="input-group">
                                            <input type="number" name="quantity" min="1" value="1"
                                                class="form-control quantity-input">
                                            <a href="javascript:void(0)" class="quanlity-plus"><i
                                                    class="fa fa-plus"></i></a>
                                            <a href="javascript:void(0)" class="quanlity-minus"><i
                                                    class="fa fa-minus"></i></a>
                                        </div>

                                        <div class="add-to-cart">
                                            <button type="submit" class="swin-btn"><span>Sepete Ekle</span></button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.cart-form').forEach(function(form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const productId = form.querySelector('input[name="product_id"]').value;
                const quantity = form.querySelector('input[name="quantity"]').value;

                const csrfToken = document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content');

                const response = await fetch('/api/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                });

                const data = await response.json();

                alert(data.message);

                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            });
        });
    });
</script>
<script>
    document.querySelectorAll('.quanlity-plus').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const input = btn.closest('.input-group').querySelector('.quantity-input');
            input.value = parseInt(input.value) + 1;
        });
    });

    document.querySelectorAll('.quanlity-minus').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const input = btn.closest('.input-group').querySelector('.quantity-input');
            const value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        });
    });
</script>
