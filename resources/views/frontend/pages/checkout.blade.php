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
                        class="title">Ödeme</div>
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
                <section class="padding-top-100 padding-bottom-100">
                    <form class="product-checkout-form" action="{{ route('checkoutPost') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Siparişiniz</h3>
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Ürünler</th>
                                            <th class="product-total">Fiyat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($cart) && count($cart) > 0)
                                            @foreach ($cart as $productId => $product)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $product['name'] }} <strong class="product-quantity">×
                                                            {{ $product['quantity'] }}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">₺</span>{{ number_format($product['price'] * $product['quantity'], 2) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2">Sepetiniz boş.</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                    @if (!empty($cart) && count($cart) > 0)
                                        @php
                                            $subtotal = collect($cart)->sum(function ($product) {
                                                return $product['price'] * $product['quantity'];
                                            });
                                        @endphp
                                        <tfoot>
                                            <tr class="order-total">
                                                <th>Toplam</th>
                                                <td>
                                                    <strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">₺</span>{{ number_format($subtotal, 2) }}
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    @endif
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-product-options">
                                    <h4>Ödeme Yöntemi</h4>
                                    <div class="form-check">
                                        <input id="productQuantity1" type="radio" name="productOption" value="option1"
                                            checked="" class="form-check-input">
                                        <label for="productQuantity1" class="form-check-label">Banka Kartı/Kredi
                                            Kartı</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button class="swin-btn checkout-submit"><span>Ödemeyi Onayla</span></button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
<script>
document.querySelector('.product-checkout-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Formun normal submit olmasını engelle

    const form = e.target;
    const url = form.action;
    const formData = new FormData(form);

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name=_token]').value,
            'Accept': 'application/json',
        },
        body: formData,
    })
    .then(response => {
        if (!response.ok) throw response;
        return response.json();
    })
    .then(data => {
        alert(data.message); // Başarı mesajı göster
        if(data.redirect_url) {
            window.location.href = data.redirect_url; // Yönlendir
        }
    })
    .catch(async errorResponse => {
        let errorMessage = 'Bir hata oluştu.';
        if (errorResponse.json) {
            const errorData = await errorResponse.json();
            if (errorData.error) errorMessage = errorData.error;
        }
        alert(errorMessage);
    });
});
</script>

