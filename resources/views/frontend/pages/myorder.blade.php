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
                        class="title">Siparişlerim</div>
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
                                    <th>ID</th>
                                    <th>Sipariş Numarası</th>
                                    <th>Ürünler</th>
                                    <th>Toplam Fiyat</th>
                                    <th>Durum</th>
                                    <th>Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($orders->count() > 0)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->products }}</td>
                                            <td>{{ $order->total_price }}₺</td>
                                            <td>
                                                @switch($order->status)
                                                    @case('preparing')
                                                        Hazırlanıyor
                                                    @break

                                                    @case('delivering')
                                                        Yolda
                                                    @break

                                                    @case('delivered')
                                                        Teslim Edildi
                                                    @break

                                                    @default
                                                        {{ ucfirst($order->status) }}
                                                @endswitch
                                            </td>

                                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Siparişiniz Yok.</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
