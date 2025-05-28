 <header>
     <div class="header-top top-layout-02">
         <div class="container">
             <div class="topbar-left">
                 <div class="topbar-content">
                     <div class="item">
                         <div class="wg-contact"><i
                                 class="fa fa-map-marker"></i><span>{{ strip_tags($config->adress) }}</span></div>
                     </div>
                     <div class="item">
                         <div class="wg-contact"><i class="fa fa-phone"></i><span>{{ $config->phone }}</span></div>
                     </div>
                 </div>
             </div>
             <div class="topbar-right">
                 <div class="topbar-content">
                     <div class="item">
                         <div class="dropdown">
                             <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                 <li><a class="dropdown-item" href="">Siparişlerim</a></li>
                                 <li><a class="dropdown-item" href="">Profil Düzenle</a></li>
                                 <li>
                                     <hr class="dropdown-divider">
                                 </li>
                                 <li>
                                     <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                         <button type="submit" class="dropdown-item">Çıkış Yap</button>
                                     </form>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
     <div class="header-main">
         <div class="container">
             <div class="open-offcanvas">&#9776;</div>
             <div class="utility-nav ">
                 <div class="dropdown dropdown-full-mobile"><a href="#" data-toggle="dropdown" role="button"
                         aria-haspopup="true" aria-expanded="false" class="search-bar dropdown-toggle"><i
                             class="fa fa-shopping-bag"></i></a>
                     <div class="dropdown-menu">
                         <div class="cart_lite">
                             <div class="cart_lite_list">
                                 <ul>
                                     @if (!empty($cart) && count($cart) > 0)
                                         @foreach ($cart as $productId => $product)
                                             <li class="cart_lite_item">
                                                 <a href="#" class="cart_item_thumbnail">
                                                     <img width="150" height="100"
                                                         src="{{ asset($product['image']) }}"
                                                         alt="{{ $product['name'] }}" class="img-responsive">
                                                 </a>
                                                 <div class="cart_item_summary">
                                                     <a href="#"
                                                         class="cart_item_title">{{ $product['name'] }}</a>
                                                     <span class="product-price-amount">
                                                         <span class="quantity">{{ $product['quantity'] }} × </span>
                                                         <span
                                                             class="product-price-currencySymbol">₺</span>{{ number_format($product['price'] * $product['quantity'], 2) }}
                                                     </span>
                                                 </div>
                                                 <form action="{{ route('cart.remove') }}" method="POST"
                                                     style="display:inline;">
                                                     @csrf
                                                     <input type="hidden" name="product_id"
                                                         value="{{ $productId }}">
                                                     <button type="submit" aria-label="Remove this item"
                                                         class="remove_from_cart_button"
                                                         style="border:none; background:none; cursor:pointer; font-size:18px;">×</button>
                                                 </form>
                                             </li>
                                         @endforeach
                                     @else
                                         <li>Sepetiniz boş.</li>
                                     @endif
                                 </ul>
                             </div>
                             <div class="cart_lite_total">
                                 <p><strong>Sepet Toplamı: </strong>
                                     <span class="product-price-amount">
                                         <span class="product-price-currencySymbol">₺</span>
                                         {{ number_format(collect($cart)->sum(function ($product) {return $product['price'] * $product['quantity'];}),2) }}
                                     </span>
                                 </p>
                             </div>
                             <div class="cart_lite_button">
                                 <a href="{{ route('cart') }}" class="swin-btn btn-sm"><span>Sepete Git</span></a>
                                 <a href="{{ route('checkout') }}" class="swin-btn btn-sm"><span>Ödemeye Geç</span></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="header-logo"><a href=" {{ route('index') }} " class="logo"><img
                         src="{{ asset($config->logo) }}" alt="fooday" class="logo-img" width="300px"
                         height="300px"></a></div>
             <nav id="main-nav-offcanvas" class="main-nav-wrapper">
                 <div class="close-offcanvas-wrapper"><span class="close-offcanvas">x</span></div>
                 <div class="main-nav">
                     <ul id="main-nav" class="nav nav-pills">
                         <li class="dropdown current-menu-item"><a href="{{ route('index') }}"
                                 class="dropdown-toggle">Ana Sayfa</a><i class="fa fa-angle-down btn-open-dropdown"></i>

                         </li>
                         <li class="dropdown current-menu-item"><a href="{{ route('menus') }}"
                                 class="dropdown-toggle">Menüler</a><i class="fa fa-angle-down btn-open-dropdown"></i>

                         </li>
                         <li class="dropdown current-menu-item"><a href="{{ route('cart') }}"
                                 class="dropdown-toggle">Sepetim</a><i class="fa fa-angle-down btn-open-dropdown"></i>

                         </li>
                         <li class="dropdown current-menu-item"><a href="{{ route('myOrders') }}"
                                 class="dropdown-toggle">Siparişlerim</a><i
                                 class="fa fa-angle-down btn-open-dropdown"></i>
                         </li>
                     </ul>
                 </div>
             </nav>
         </div>
     </div>
 </header>
