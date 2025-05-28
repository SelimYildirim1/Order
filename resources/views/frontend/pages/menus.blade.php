@extends('frontend.layout.layout')
@section('content')
    <div class="page-container">
        <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;"
            data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
            <div class="container">
                <div class="title-wrapper">
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);"
                        data--50-top="transform: translateY(-15px);opacity:0.8;"
                        data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title"
                        class="title">Menü</div>
                    <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
                        <span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);"
                        data--50-top="transform: translateY(15px);opacity:0.8;"
                        data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title"
                        class="subtitle"></div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <section class="product-sesction-02 padding-top-100 padding-bottom-100">
                <div class="container">
                    <div class="swin-sc swin-sc-title style-3">
                        <p class="title"><span>Menü</span></p>
                    </div>
                    <div class="menu-slider-wrapper">
                        <div class="container">
                            <!-- Menü Sekmeleri -->
                            <div class="menu-tabs">
                                @foreach ($menuses as $index => $menu)
                                    <button class="menu-tab {{ $index == 0 ? 'active' : '' }}"
                                        data-tab="menu-{{ $menu->id }}">
                                        {{ $menu->name }}
                                    </button>
                                @endforeach
                            </div>

                            <!-- Ürün Sliders -->
                            <div class="menu-products">
                                @foreach ($menuses as $index => $menu)
                                    <div class="product-group {{ $index == 0 ? 'active' : '' }}"
                                        id="menu-{{ $menu->id }}">
                                        <div class="product-slider">
                                            @foreach ($menu->products as $product)
                                                <div class="product-card">
                                                    <a href="product/{{ $product->slug }}">
                                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                                        <h4>{{ $product->name }}</h4>
                                                        <p>₺{{ number_format($product->price, 2) }}</p>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
