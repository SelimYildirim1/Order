<footer>

    <div class="footer-top"></div>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ft-widget-area">
                        <div class="ft-area1">
                            <div class="swin-wget swin-wget-about">
                                <div class="clearfix"><a class="wget-logo"><img src="{{ asset($config->icon) }}"
                                            alt="" class="img img-responsive" width="200px" height="200px"></a>
                                </div>

                                <div class="about-contact-info clearfix">
                                    <div class="address-info">
                                        <div class="info-icon"><i class="fa fa-map-marker"></i></div>
                                        <div class="info-content">
                                            <p>{{strip_tags( $config->adress) }}</p>
                                        </div>
                                    </div>
                                    <div class="phone-info">
                                        <div class="info-icon"><i class="fa fa-mobile-phone"></i></div>
                                        <div class="info-content">
                                            <p>{{ $config->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="email-info">
                                        <div class="info-icon"><i class="fa fa-envelope"></i></div>
                                        <div class="info-content">
                                            <p>{{ $config->mail }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ft-fixed-area">
                        <div class="reservation-box">
                            <div class="reservation-wrap">
                                <h3 class="res-title">Çalışma Saatleri</h3>
                                <div class="res-date-time">
                                    <div class="res-date-time-item">
                                        <div class="res-date">
                                            <div class="res-date-item">
                                                <div class="res-date-text">
                                                    <p>Her Gün:</p>
                                                </div>
                                                <div class="res-date-dot">
                                                    .......................................</div>
                                            </div>
                                        </div>
                                        <div class="res-time">
                                            <div class="res-time-item">
                                                <p>{{ $config->start }} - {{ $config->finish }}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
