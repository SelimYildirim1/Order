@extends('frontend.layout.layout')
@section('content')

    <div class="page-container">
        <div class="top-header top-slider">
            @if (!empty('slider'))
                @foreach ($slider as $slide)
                    <div class="slides">
                        <div class="slide-content slide-layout-01">
                            <div class="swin-sc swin-sc-title"><img src="assets/images/slider/slider1-icon.png"
                                    data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="500" alt=""
                                    class="slide-icon animated fadeInUp">
                                <p data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="800"
                                    class="top-title animated fadeInUp"><span>{{ $slide->name }}</span></p>
                                <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000"
                                    class="title animated fadeInUp">{{ $slide->content }}</h3>
                            </div>
                        </div>
                        <div class="slide-bg"><img src="{{ asset($slide->image) }}" alt=""
                                class="img img-responsive"></div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="menu-slider-wrapper">
            <div class="container">
                <!-- Menü Sekmeleri -->
                <div class="menu-tabs">
                    @foreach ($menuses as $index => $menu)
                        <button class="menu-tab {{ $index == 0 ? 'active' : '' }}" data-tab="menu-{{ $menu->id }}">
                            {{ $menu->name }}
                        </button>
                    @endforeach
                </div>

                <!-- Ürün Sliders -->
                <div class="menu-products">
                    @foreach ($menuses as $index => $menu)
                        <div class="product-group {{ $index == 0 ? 'active' : '' }}" id="menu-{{ $menu->id }}">
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
@endsection
