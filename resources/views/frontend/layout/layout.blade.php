<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>
    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!-- IE 9-->
    <!-- Vendors-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/flexslider/flexslider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/swipebox/css/swipebox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/pageloading/css/component.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dialog/css/dialog.css') }}">
    <!-- Font-icon-->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-icon/style.css') }}">
    <!-- Style-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/extra.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/widget.css') }}">
    <link id="colorpattern" rel="stylesheet" type="text/css" href="{{ asset('assets/css/color/colordefault.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/live-settings.css') }}">

    <link rel="shortcut icon" href="{{ asset($config->logo) }}" title="Favicon" sizes="180x180">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset($config->logo) }}" sizes="180x180" type="image/png">

    <!-- Mobil Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($config->logo) }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($config->logo) }}">
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-qI1zVoM4+1rQnEtRZDVVDscMX7Zb7UN8PqsAMGFUzQyf6RSYhTVuU3g70n0I2zN3" crossorigin="anonymous">

    <!-- Bootstrap Bundle JS (Popper dahil) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxCkF5Q0kCOWYgo0t7HnEbbA1zFTq+axgC/UiI3XyZ8Ebs" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Script Loading Page-->
    <script src="{{ asset('assets/vendors/html5shiv.js') }}"></script>
    <script src="{{ asset('assets/vendors/respond.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pageloading/js/snap.svg-min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pageloading/sidebartransition/js/modernizr.custom.js') }}"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BYR30Q9JF8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BYR30Q9JF8');
    </script>
</head>

<body>
    <div id="pagewrap" class="pagewrap">
        <div id="html-content" class="wrapper-content">
            @include('frontend.inc.header')
            @yield('content')
            @include('frontend.inc.footer')
            <a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
        </div>
        <div id="loader"
            data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z"
            class="pageload-overlay">
            <div class="loader-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60"
                    preserveaspectratio="none">
                    <path
                        d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z">
                    </path>
                </svg>
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
                <div class="sk-circle sk-circle-out">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="add-to-cart-dialog" class="add-to-card-dialog dialog">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="dialog-product-img"><img src="assets/images/product/product-full-02.jpg"
                                alt="fooday" class="img img-responsive"></div>
                    </div>
                    <div class="col-md-7">
                        <div class="dialog-product-title">The Cracker Barrel's Country Boy Breakfast</div>
                        <div class="dialog-product-price">$25.0</div>
                        <div class="product-quanlity">
                            <div class="input-group">
                                <input type="text" name="quanlity" placeholder="" value="1"
                                    class="form-control"><a href="javascript:void(0)" class="quanlity-plus"><i
                                        class="fa fa-plus"></i></a><a href="javascript:void(0)"
                                    class="quanlity-minus"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="dialog-product-options">
                            <p class="option-title">More Options</p>
                            <div class="form-check">
                                <input id="productQuantity1" type="radio" name="productOption" value="option1"
                                    checked="" class="form-check-input">
                                <label for="productQuantity1" class="form-check-label">Aliquip ex ea commodo
                                    consequat</label>
                            </div>
                            <div class="form-check">
                                <input id="productQuantity2" type="radio" name="productOption" value="option2"
                                    checked="" class="form-check-input">
                                <label for="productQuantity2" class="form-check-label">Quis ullam laboris nisi ut
                                    aliquip ex ea commodo</label>
                            </div>
                            <div class="form-check">
                                <input id="productQuantity3" type="radio" name="productOption" value="option3"
                                    checked="" class="form-check-input">
                                <label for="productQuantity3" class="form-check-label">Commodo consequat
                                    aliquip</label>
                            </div>
                        </div>
                        <div class="dialog-product-options">
                            <p class="option-title">Other options</p>
                            <div class="form-check">
                                <input id="productOption2" type="checkbox" name="" value="option3"
                                    checked="" class="form-check-input">
                                <label for="productOption2" class="form-check-label">Ullam laboris nisi ut aliquip
                                    ex ea commodo</label>
                            </div>
                            <div class="form-check">
                                <input id="productOption3" type="checkbox" name="" value="option3"
                                    class="form-check-input">
                                <label for="productOption3" class="form-check-label">Ut enim ad minim veniam</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="dialog-button-group"><a href="product-cart.html"
                        class="swin-btn btn-transparent"><span>View Cart</span></a><a data-toggle="dialog"
                        data-target="#add-to-cart-dialog" class="swin-btn open-toast"><span>Order Now</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="add-to-card-toast toast">
        <div class="toast_content">
            <div role="alert" class="alert alert-success">
                <button type="button" aria-label="Close" class="close close-toast"><span
                        aria-hidden="true">×</span></button><strong>Order Successfully!</strong> This message will
                disappearance in 5 seconds
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- jQuery-->
    <script src="{{ asset('assets/vendors/jquery-1.10.2.min.js') }}"></script>
    <!-- Bootstrap JavaScript-->
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Vendors-->
    <script src="{{ asset('assets/vendors/flexslider/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('assets/vendors/swipebox/js/jquery.swipebox.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-countTo/jquery.countTo.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/gmaps/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/audiojs/audio.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/vide/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pageloading/js/svgLoader.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pageloading/js/classie.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pageloading/sidebartransition/js/sidebarEffects.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wowjs/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-cookie/js.cookie.js') }}"></script>
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
        integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous">
    </script>
    <!-- Own script-->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/elements.js') }}"></script>
    <script src="{{ asset('assets/js/widget.js') }}"></script>
</body>


</html>
