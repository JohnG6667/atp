<x-app-layout>
    <!---------------------------------------------------- home start ------------------------------------------------------>
    <div class="upper-page" id="home">
        <!-- hero bg start -->
        <div class="hero-fullscreen">
            <!-- vertical split slider start -->
            <div class="hero-fullscreen-FIX">
                <!-- vertical split slider content start -->
                <div class="split-slideshow">
                    <!-- vertical split slider IMG start -->
                    <div class="slideshow">
                        <div class="slider">
                            <div class="item item-1 overlay overlay-dark-75"></div>
                            <div class="item item-2 overlay overlay-dark-75"></div>
                            <div class="item item-3 overlay overlay-dark-75"></div>
                            <div class="item item-4 overlay overlay-dark-75"></div>
                        </div>
                    </div><!-- vertical split slider IMG end -->
                    <!-- vertical split slider text start -->
                    <div class="slideshow-text home-page-title-slideshow">
                        <div class="item slideshow-item">
                            Nahomi
                        </div>
                        <div class="item slideshow-item">
                            Alejandra
                        </div>
                        <div class="item slideshow-item">
                            Torres
                        </div>
                        <div class="item slideshow-item">
                            Paspuel
                        </div>
                    </div><!-- vertical split slider text end -->
                </div><!-- vertical split slider content end -->
            </div><!-- vertical split slider end -->
        </div><!-- hero bg end -->
    </div>
    <!------------------------------------------------------ home end -->
    <!------------------------------------------------------ about start -->
    <section id="about">
        <!-- container start -->
        <div class="container sections">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading section-heading-about">
                        About
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-md-4 col-sm-4">
                    <!-- intro start -->
                    <div class="intro-years">
                        <h2>
                            Years
                        </h2>
                        <div class="borders-berlin"></div>
                        <h3 class="facts-counter-number">
                            19
                        </h3>
                        <h4>
                            of Service
                        </h4>
                    </div><!-- intro end -->
                </div><!-- col end -->
                <!-- col start -->
                <div class="col-md-8 col-sm-8">
                    <!-- quote start -->
                    <blockquote>
                        <p>
                            {{ $about->description }}
                        </p>
                    </blockquote><!-- quote end -->
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row carousel-img-wrapper">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading secondary">
                        The Team
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row" id="carousel-img">
                <!-- col start -->
                <div class="col-sm-12">
                    <!-- IMG carousel start -->
                    <div class="owl-carousel" id="carousel-img-carousel">
                        @foreach ($teams as $team)
                            <!-- carousel img item 1 start -->
                            <div class="carousel-img-item hover-effect-img">
                                <div class="hover-icons">
                                    <a class="iw-slide-left ion-social-instagram" href="{{ $team->instagram }}"
                                        target="_blank"></a> <a class="ion-social-facebook" href="{{ $team->facebook }}"
                                        target="_blank"></a> <a class="iw-slide-right ion-social-googleplus"
                                        href="{{ $team->google }}" target="_blank"></a>
                                </div>
                                <div class="carousel-img-item-1"
                                    @if ($team->image) style="background-image: url({{ Storage::url($team->image->url) }});" @endif>
                                </div>


                                <div class="hover-effect the-team"></div>
                                <div class="team-box">
                                    {{ $team->name }}<span>{{ $team->position }}</span>
                                </div>
                            </div><!-- carousel img item 1 end -->
                        @endforeach
                    </div><!-- IMG carousel end -->
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ about end -->
    <!------------------------------------------------------ know-how start -->
    <section id="know-how">
        <!-- container start -->
        <div class="container-fluid sections">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading secondary secondary-know-how">
                        The Know-how
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-md-6 nopadding">
                    <!-- slick right start -->
                    <div class="slick-right-alternative">
                        @foreach ($skills as $skill)
                            @if ($skill->image)
                                <!-- know-how carousel item 1 img start -->
                                <div class="img-fullwidth-wrapper">
                                    <div class="img-fullwidth img-fullwidth-all img-fullwidth-know-how-carousel-1"
                                        style="background-image: url({{ Storage::url($skill->image->url) }})">
                                    </div>
                                </div><!-- know-how carousel item 1 img end -->
                            @else
                                <!-- know-how carousel item 1 img start -->
                                <div class="img-fullwidth-wrapper">
                                    <div class="img-fullwidth img-fullwidth-all img-fullwidth-know-how-carousel-1">
                                    </div>
                                </div><!-- know-how carousel item 1 img end -->
                            @endif
                        @endforeach
                    </div><!-- slick right end -->
                </div><!-- col end -->
                <!-- col start -->
                <div class="col-md-6 nopadding">
                    <!-- slick left start -->
                    <div class="slick-left">
                        <div class="blockquote bg-color-1">
                            <!-- center container start -->
                            <div class="center-container">
                                <!-- center block start -->
                                <div class="center-block">
                                    <!-- skills bar start -->
                                    <div class="show-skillbar">
                                        @foreach ($skills as $skill)
                                            <!-- skill 1 start -->
                                            <div class="skillbar" data-percent="{{ $skill->level }}">
                                                <span class="skillbar-title">{{ $skill->name }}</span>
                                                <div class="skillbar-bar"></div><span class="skill-bar-percent"></span>
                                            </div><!-- skill 1 end -->
                                        @endforeach
                                    </div><!-- skills bar end -->
                                </div><!-- center block end -->
                            </div><!-- center container end -->
                        </div>
                    </div><!-- slick left end -->
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ know-how end -->
    <!------------------------------------------------------ facts start -->
    <section class="section-parallax" id="facts">
        <!-- container start -->
        <div class="container-fluid sections">
            <!-- row start -->
            <div class="row">
                <!-- parallax wrapper start -->
                <div class="parallax parallax-facts" data-parallax-speed="0.75">
                    <!-- parallax borders start -->
                    <div class="borders"></div><!-- parallax borders end -->
                    <!-- parallax overlay start -->
                    <div class="parallax-overlay"></div><!-- parallax overlay end -->
                    <!-- parallax content start -->
                    <div class="parallax-content text-center">
                        <h2 class="section-heading light section-heading-correction section-heading-correction-facts">
                            The Facts
                        </h2><!-- facts counter start -->
                        <div class="facts-counter-wrapper">
                            @foreach ($facts as $fact)
                                <!-- col start -->
                                <div class="col-xs-6 col-sm-4">
                                    <!-- fact 1 start -->
                                    <div class="facts-counter-number">
                                        {{ $fact->number }}
                                    </div>
                                    <div class="facts-counter-description">
                                        <i class="ion-ios-{{ $fact->logo }} facts-counter-description-img"></i> <span
                                            class="facts-counter-title">{{ $fact->name }}</span>
                                    </div><!-- fact 1 end -->
                                </div><!-- col end -->
                            @endforeach
                            <!-- clearfix start -->
                            <div class="clearfix visible-xs-block"></div><!-- clearfix end -->

                        </div><!-- facts counter end -->
                    </div><!-- parallax content end -->
                </div><!-- parallax wrapper end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ facts end -->
    <!------------------------------------------------------ featured start -->
    <section class="extra-spacer" id="featured">
        <!-- container start -->
        <div class="container-fluid sections">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading section-heading-featured">
                        Featured work
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-md-6 nopadding">
                    <!-- slick left start -->
                    <div class="slick-left">
                        @foreach ($works as $work)
                            <!-- featured item 1 info start -->
                            <div class="blockquote bg-color-{{ $work->id }}"
                                style="background-color: #f5f5f5 !important;">
                                <!-- center container start -->
                                <div class="center-container">
                                    <!-- center block start -->
                                    <div class="center-block">
                                        <h3 class="cd-featured-name">
                                            {{ $work->type }}
                                        </h3>
                                        <p>
                                            {{ $work->description }}
                                        </p>
                                        <div class="social-icons-wrapper">
                                            <ul class="social-icons">
                                                <li class="social-icon">
                                                    <a class="ion-social-facebook" href="{{ $work->facebook }}"
                                                        target="_blank"></a>
                                                </li>
                                                <li class="social-icon">
                                                    <a class="ion-social-instagram" href="{{ $work->instagram }}"
                                                        target="_blank"></a>
                                                </li>
                                                <li class="social-icon">
                                                    <a class="ion-social-pinterest" href="{{ $work->pinterest }}"
                                                        target="_blank"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- center block end -->
                                </div><!-- center container end -->
                            </div><!-- featured item 1 info end -->
                        @endforeach
                    </div><!-- slick left end -->
                </div><!-- col end -->
                <!-- col start -->
                <div class="col-md-6 nopadding">
                    <!-- slick right start -->
                    <div class="slick-right">
                        @foreach ($works as $work)
                            <!-- featured item carousel 1 img start -->
                            <div class="img-fullwidth-wrapper">
                                @if ($work->image)
                                    <div class="img-fullwidth img-fullwidth-all"
                                        style="background-image: url({{ Storage::url($work->image->url) }})">
                                    </div>
                                @else
                                    <div class="img-fullwidth img-fullwidth-all img-fullwidth-featured-carousel-1">
                                    </div>
                                @endif

                            </div><!-- featured item carousel 1 img end -->
                        @endforeach
                    </div><!-- slick right end -->
                </div><!-- col end -->
                <!-- slick arrow bar start -->
                <div class="bar0" id="bar">
                    <img alt="Bar Arrow" src="img/active-arrow.png">
                </div><!-- slick arrow bar end -->
                <!-- slick bottom start -->
                <div class="slick-bottom">
                    @foreach ($works as $work)
                        <!-- featured item 1 info bottom start -->
                        <div>
                            <div class="cd-author">
                                <img alt="Featured Thumb Img" src="img/atp/autor.jpg">
                                <ul class="cd-author-info">
                                    <li>{{ $work->name }}
                                    </li>
                                    <li>{{ $work->type }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- featured item 1 info bottom end -->
                    @endforeach
                </div><!-- slick bottom end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ featured end -->
    <!------------------------------------------------------ services start -->
    <section id="services">
        <!-- container start -->
        <div class="container sections">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading section-heading-correction section-heading-correction-services">
                        Services
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row text-center">
                @foreach ($services as $service)
                    <!-- col start -->
                    <div class="col-md-4 services-block">
                        <h4 class="service-heading">
                            {{ $service->name }}
                        </h4>
                        <div class="service-number">
                            {{ $service->id }}
                        </div>
                        <p>
                            {{ $service->description }}
                        </p>
                    </div><!-- col end -->
                @endforeach
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ services end -->
    <!------------------------------------------------------ services 2 start -->
    <section id="services-2">
        <!-- container start -->
        <div class="container-fluid sections sections-medium-bg">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-md-6 col-sm-6 col-sm-push-6 nopadding">
                    <!-- slick right start -->
                    <div class="slick-right-alternative">
                        <!-- services carousel item 1 img start -->
                        <div class="img-fullwidth-wrapper">
                            <div class="img-fullwidth img-fullwidth-all img-fullwidth-services-carousel-1"></div>
                        </div><!-- services carousel item 1 img end -->
                        <!-- services carousel item 2 img start -->
                        <div class="img-fullwidth-wrapper">
                            <div class="img-fullwidth img-fullwidth-all img-fullwidth-services-carousel-2"></div>
                        </div><!-- services carousel item 2 img end -->
                        <!-- services carousel item 3 img start -->
                        <div class="img-fullwidth-wrapper">
                            <div class="img-fullwidth img-fullwidth-all img-fullwidth-services-carousel-3"></div>
                        </div><!-- services carousel item 3 img end -->
                    </div><!-- slick right end -->
                </div><!-- col end -->
                <!-- col start -->
                <div class="col-md-6 col-sm-pull-6 nopadding">
                    <!-- slick left start -->
                    <div class="slick-left">
                        <div class="blockquote bg-color-1">
                            <!-- center container start -->
                            <div class="center-container">
                                <!-- center block start -->
                                <div class="center-block">
                                    <div class="services-wrapper">
                                        <div class="services-accordion">
                                            <ul>
                                                @foreach ($services as $service)
                                                    <li>
                                                        <span>{{ $service->name }}</span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- center block end -->
                            </div><!-- center container end -->
                        </div>
                    </div><!-- slick left end -->
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ services 2 end -->
    <!------------------------------------------------------ testimonials start -->
    <section id="testimonials">
        <!-- container start -->
        <div class="container sections">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2
                        class="section-heading secondary section-heading-correction-secondary section-heading-correction-secondary-testimonials">
                        Testimonials
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row text-center">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <div class="owl-carousel" id="testimonials-carousel">
                        @foreach ($testimonials as $testimonial)
                            <!-- testimonials quote 1 start -->
                            <div class="testimonials-quote">
                                <div class="testimonials-quote-img">
                                    <img alt="Testimonials image" class="testimonials-quote-img"
                                        @if ($testimonial->image) src="{{ Storage::url($testimonial->image->url) }}"
                                        @else
                                        src="img/testimonials/testimonials-quote-img-1.jpg" @endif>
                                </div>
                                <p>
                                    <span class="section-testimonials quote-mark-l ion-quote"></span>
                                    {{ $testimonial->description }}
                                    <span class="section-testimonials quote-mark-r ion-quote"></span>
                                </p>
                                <div class="testimonials-signature">
                                    {{ $testimonial->name }}
                                </div>
                            </div><!-- testimonials quote 1 end -->
                        @endforeach
                    </div>
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ testimonials end -->
    <!------------------------------------------------------ works start -->
    <section id="works">
        <!-- container start -->
        <div class="container-fluid">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading section-heading-works">
                        Works
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row text-center">
                <!-- photoSwipe start -->
                <div class="legendary-gallery">
                    @foreach ($imageWorks as $imageWork)
                        <!-- gallery item 1 start -->
                        <figure class="col-sm-12 col-md-6 col-lg-6 col-xl-6 hover-effect-img move-down">
                            @if ($imageWork->image)
                                <a data-size="1920x1280" href="{{ Storage::url($imageWork->image->url) }}"><img
                                        alt="Image description" class="img-responsive"
                                        src="{{ Storage::url($imageWork->image->url) }}"></a>
                            @else
                                <a data-size="1920x1280" href="photoswipe/photos/large/1.jpg"><img
                                        alt="Image description" class="img-responsive"
                                        src="photoswipe/photos/small/1.jpg"></a>
                            @endif
                            <figcaption>
                                <span class="img-caption">{{ $imageWork->name }}</span>
                                <div class="hover-effect"></div>
                                <div class="hover-icons">
                                    <a class="iw-slide-right ion-ios-plus-empty" href="#"></a> <a
                                        class="iw-slide-left ion-share" href="#"></a>
                                </div>
                            </figcaption>
                        </figure><!-- gallery item 1 end -->
                    @endforeach
                </div><!-- photoSwipe end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ works end -->
    <!------------------------------------------------------ news start -->
    <section id="news">
        <!-- container start -->
        <div class="container sections sections-correction">
            <!-- row -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2
                        class="section-heading section-heading-correction-second section-heading-correction-second-news">
                        News
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-sm-12">
                    <!-- news carousel start -->
                    <div class="owl-carousel" id="news-carousel">
                        @foreach ($posts as $post)
                            <!-- news item 1 start -->
                            <div class="news-item">
                                <figure class="news-content">
                                    <img alt="News Img"
                                        @if ($post->image) src="{{ Storage::url($post->image->url) }}"
                                    @else
                                    src="img/news/news-1.jpg" @endif>
                                    <div class="date">
                                        May 10, 2017, Wednesday
                                    </div>
                                    <figcaption>
                                        <h2>
                                            {{ $post->title }}
                                        </h2>
                                        <h3>
                                            {{ $post->category }}
                                        </h3>
                                        <p>
                                            {{ $post->description }}
                                        </p><a class="c-btn" data-toggle="modal"
                                            href="#newsModal-{{ $post->id }}"><span>Read
                                                more</span></a>
                                    </figcaption>
                                </figure>
                            </div><!-- news item 1 end -->
                        @endforeach
                    </div><!-- news carousel end -->
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ news end -->
    <!------------------------------------------------------ contact start -->
    <section class="section-parallax" id="contact">
        <!-- container start -->
        <div class="container-fluid sections">
            <!-- row start -->
            <div class="row">
                <!-- parallax wrapper start -->
                <div class="parallax parallax-contact" data-parallax-speed="0.75">
                    <!-- parallax borders start -->
                    <div class="borders"></div><!-- parallax borders end -->
                    <!-- parallax overlay start -->
                    <div class="parallax-overlay"></div><!-- parallax overlay end -->
                    <!-- parallax content start -->
                    <div class="parallax-content text-center">
                        <h2
                            class="section-heading light section-heading-correction section-heading-correction-contact">
                            Contact
                        </h2><!-- contact info start -->
                        <div class="contact-info-wrapper">
                            <!-- col start -->
                            <div class="col-sm-4">
                                <div class="contact-info-description">
                                    <i class="ion-ios-location-outline contact-info-description-img"></i> <span
                                        class="contact-info-text">ex Inc.<br>
                                        Touchdown Dr 1176</span>
                                </div>
                            </div><!-- col end -->
                            <!-- col start -->
                            <div class="col-sm-4">
                                <div class="contact-info-description">
                                    <i class="ion-ios-email-outline contact-info-description-img large"></i> <span
                                        class="contact-info-text large"><a class="link-underline contact"
                                            href="mailto:contact@domainname.com">contact@domainname.com</a></span>
                                </div>
                            </div><!-- col end -->
                            <!-- col start -->
                            <div class="col-sm-4">
                                <div class="contact-info-description">
                                    <i class="ion-ios-telephone-outline contact-info-description-img"></i> <span
                                        class="contact-info-text">[00] 11 - 76<br>
                                        [01] 11 - 76</span>
                                </div>
                            </div><!-- col end -->
                        </div><!-- contact info end -->
                    </div><!-- parallax content end -->
                </div><!-- parallax wrapper end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ contact end -->
    <!------------------------------------------------------ contact form start -->
    <section class="extra-spacer-contact" id="get-in-touch">
        <!-- container start -->
        <div class="container sections">
            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading secondary section-heading-correction-secondary-second">
                        Get in touch
                    </h2>
                </div><!-- col end -->
            </div><!-- row end -->
            <!-- row start -->
            <div class="row">
                <!-- contact form content start -->
                <div id="contact-form">
                    <form action="contact.php" id="form" method="post" name="send">
                        <!-- col start -->
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <input class="requiredField name" id="name" name="name" placeholder="Name"
                                type="text">
                        </div><!-- col end -->
                        <!-- col start -->
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <input class="requiredField email" id="email" name="email" placeholder="Email"
                                type="text">
                        </div><!-- col end -->
                        <!-- col start -->
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <input class="requiredField subject" id="subject" name="subject" placeholder="Subject"
                                type="text">
                        </div><!-- col end -->
                        <div class="make-space">
                            <textarea class="requiredField message" id="message" name="message" placeholder="Message"></textarea>
                        </div>
                        <div>
                            <button class="c-btn fullwidth" id="submit"
                                type="submit"><span>Submit</span></button>
                        </div>
                    </form>
                </div><!-- contact form content end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section>
    <!------------------------------------------------------ contact form end -->
    <!------------------------------------------------------ photoSwipe background start -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close"
                        title="Close (Esc)"></button> <button class="pswp__button pswp__button--share"
                        title="Share"></button> <button class="pswp__button pswp__button--fs"
                        title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom"
                        title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------ photoSwipe background end -->

</x-app-layout>
