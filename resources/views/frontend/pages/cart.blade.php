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
                        class="title">Sepet</div>
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
                    <form class="product-cart-form">
                        <table class="shop_table shop_table_responsive">
                            <thead>
                                <tr>
                                    <th class="product-remove"> </th>
                                    <th class="product-thumbnail"> </th>
                                    <th class="product-name">Ürün</th>
                                    <th class="product-price">Fiyat</th>
                                    <th class="product-quantity">Adet</th>
                                    <th class="product-subtotal">Toplam Fiyat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($cart))
                                    @foreach ($cart as $productId => $product)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <form action="{{ route('cart.remove') }}" method="POST" class="remove-form"
                                                    style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                                    <button type="submit" aria-label="Remove this item" class="remove"
                                                        style="border:none; background:none; font-size:20px; cursor:pointer;">×</button>
                                                </form>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img width="150" height="100" src="{{ asset($product['image']) }}"
                                                        alt="{{ $product['name'] }}" class="img-responsive">
                                                </a>
                                            </td>
                                            <td data-title="Product" class="product-name">
                                                <a href="#">{{ $product['name'] }}</a>
                                            </td>
                                            <td data-title="Price" class="product-price">
                                                <span class="product-Price-amount amount">
                                                    <span
                                                        class="product-Price-currencySymbol">₺</span>{{ number_format($product['price'], 2) }}
                                                </span>
                                            </td>
                                            <td data-title="Quantity" class="product-quantity">
                                                <div class="quantity">
                                                    <input type="number" readonly step="1" min="1"
                                                        name="cart[{{ $productId }}][qty]"
                                                        value="{{ $product['quantity'] }}" title="Qty" size="4"
                                                        pattern="[0-9]*" inputmode="numeric" class="form-control input-qty">
                                                </div>
                                            </td>
                                            <td data-title="Total" class="product-subtotal">
                                                <span class="product-Price-amount amount">
                                                    <span
                                                        class="product-Price-currencySymbol">₺</span>{{ number_format($product['price'] * $product['quantity'], 2) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Sepetiniz boş.</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </form>
                    <div class="product-cart-total" id="cart-section">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6">
                                <h2 class="cart-total-title">Sepet Toplamı</h2>
                                <table cellspacing="0" class="shop_table" id="cart-table">
                                    <tbody id="cart-body">
                                        <!-- JS ile doldurulacak -->
                                    </tbody>
                                </table>
                                <div id="cart-total-price"></div>
                                <a href="{{ route('checkout') }}" class="swin-btn"><span>Sepeti Onayla</span></a>
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
        fetch('/api/cart')
            .then(response => response.json())
            .then(data => {
                const cart = data.cart;
                let total = 0;
                let html = '';

                for (let id in cart) {
                    const item = cart[id];
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;

                    html += `
                    <tr>
                        <td>${item.name} x ${item.quantity}</td>
                        <td>₺${(itemTotal).toFixed(2)}</td>
                    </tr>
                `;
                }

                document.getElementById('cart-body').innerHTML = html;
                document.getElementById('cart-total-price').innerHTML = `
                <strong>Toplam: ₺${total.toFixed(2)}</strong>
            `;
            });
    });
</script>
