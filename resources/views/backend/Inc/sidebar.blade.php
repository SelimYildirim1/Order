<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box mt-2">
        <!-- Dark Logo-->
        <a href="{{ route('panel.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset($config->logo) }}" alt="" width="100" height="100">
            </span>
            <span class="logo-lg">
                <img src="{{ asset($config->logo) }}" alt="" width="100" height="100">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('panel.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset($config->logo) }}" alt="" width="100" height="100">
            </span>
            <span class="logo-lg">
                <img src="{{ asset($config->logo) }}" alt="" width="100" height="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="/assets/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">S</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                            class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                            class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Selim Yıldırım!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                    class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                    class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                    class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance :
                    <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span
                    class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                    class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                    class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock
                    screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                    data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                @if (Auth::user()->role === 'admin')
                    <li class="menu-title"><span>Menü</span></li>
                    <li class="menu-title"><span>Site Ayarları</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('panel.settings.index') }}">
                            <span>Ayarlar</span>
                        </a>
                    </li>

                    <li class="menu-title"><span>Slider İşlemleri</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSlider" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarSlider">
                            <span>Slider</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarSlider">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('panel.slider.index') }}" class="nav-link">Slider</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.slider.create') }}" class="nav-link">Slider Ekle</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title"><span>Menü İşlemleri</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarmenu" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarmenu">
                            <span>Menü</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarmenu">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('panel.menu.index') }}" class="nav-link">Menüler</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.menu.create') }}" class="nav-link">Menü Ekle</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title"><span>Ürün İşlemleri</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarurun" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarurun">
                            <span>Ürün</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarurun">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('panel.products.index') }}" class="nav-link">Ürünler</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.products.create') }}" class="nav-link">Ürün Ekle</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title"><span>Sipariş İşlemleri</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('panel.orders.getOrders') }}">
                            <span>Siparişler</span>
                        </a>
                    </li>

                    <li class="menu-title"><span>Kurye İşlemleri</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarkurye" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarkurye">
                            <span>Kurye</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarkurye">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('panel.couriers.index') }}" class="nav-link">Kuryeler</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.couriers.create') }}" class="nav-link">Kurye Ekle</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @elseif(Auth::user()->role === 'courier')
                    <li class="menu-title"><span>Siparişlerim</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('panel.couriers.myOrders') }}">
                            <span>Siparişlerim</span>
                        </a>
                    </li>
                @endif

            </ul>

        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
