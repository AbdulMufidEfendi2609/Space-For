@extends('layouts.landing')

@section('title', "Landing")

@section('content')
<section id="hero" class="section hero">
    <div class="container">
        <div class="row row-content">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="hero-headline mt-40">Engage more users & supercharge your landing conversion rates
                </div>
                <div class="hero-bio">Launch your campaign and benefit from our expertise on designing and
                    managing conversion centered landing pages.</div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 offset-lg-1">
                <div class="hero-form">
                    <h6>Start Your 30-day Free Trial</h6>
                    <form method="post" action="assets/php/contact.php" class="contactForm mb-0">
                        <div id="result" class="contact-result"></div>
                        <div>
                            <label class="holder" for="name">Your name*</label>
                            <input type="text" name="first-name" class="form-control" required>
                        </div>
                        <div>
                            <label class="holder" for="name">Email address*</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div>
                            <label class="holder" for="name">Password*</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>

                        <div>
                            <input type="submit" class="btn btn--primary btn--block mt-10"
                                value="Get Free Trial Now">
                        </div>
                        <div class="form-notes">
                            <span>Hurry up, limited time offer</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #slider end -->
<!-- Feature #1
============================================= -->
<section id="feature1" class="section feature feature-center bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading heading-1 text--center mb-80">
                    <h2 class="heading-title">
                        We design your landing page to get high convertion rates
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Panel #1 -->
            <div class="col-12 col-md-4 col-lg-4">
                <div class="feature-panel">
                    <div class="feature-img bg-blue">
                        <img src="{{ asset('landing/images/features/champion.svg') }}" alt="target">
                    </div>
                    <div class="feature-content">
                        <h3>Start your campaign</h3>
                        <p>Highly targeted landing pages will increase your results, and optimization with A/B
                            testing takes you to the next level. </p>
                    </div>
                </div>
                <!-- .feature-panel end -->
            </div>
            <!-- .col-md-4 end -->

            <!-- Panel #2 -->
            <div class="col-12 col-md-4 col-lg-4">
                <div class="feature-panel">
                    <div class="feature-img bg-green">
                        <img src="{{ asset('landing/images/features/team.svg') }}" alt="users">
                    </div>
                    <div class="feature-content">
                        <h3>Engage new users</h3>
                        <p>Higher conversion rates means you get more business from your cur rent traffic and
                            reduce cost per cost per acquisition.</p>
                    </div>
                </div>
                <!-- .feature-panel end -->
            </div>
            <!-- .col-md-4 end -->

            <!-- Panel #3 -->
            <div class="col-12 col-md-4 col-lg-4">
                <div class="feature-panel">
                    <div class="feature-img bg-orange">
                        <img src="{{ asset('landing/images/features/chart.svg') }}" alt="chart">
                    </div>
                    <div class="feature-content">
                        <h3>Claim your reward</h3>
                        <p>Stop wasting money on more traffic. Get more leads on your existing traffic instead.
                            At the end, this improves your ROI significantly.</p>
                    </div>
                </div>
                <!-- .feature-panel end -->
            </div>
            <!-- .col-md-4 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #feature1 end -->
<!-- Feature #2
============================================= -->
<section id="feature2" class="section feature feature-2 bg-shape">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <img class="img-fluid" src="{{ asset('landing/images/features/service-1.svg') }}" alt="device" />
            </div>
            <!-- .col-md-6 end -->
            <div class="col-12 col-md-12 col-lg-5 offset-lg-1">
                <div class="feature-panel mt-80">
                    <div class="feature-img bg-purple">
                        <img src="{{ asset('landing/images/features/bookmark.svg') }}" alt="device">
                    </div>
                    <div class="feature-content">
                        <h3>Build and customize your perfect landing page</h3>
                        <p>This should be used to tell a story and let your users know a little more about your
                            product or service. How can you benefit them? convince them to use your service.</p>
                    </div>
                </div>
                <!-- .feature-panel end -->
            </div>
            <!-- .col-md-6 end -->
        </div>
        <div class="clearfix mt-100 pt-150"></div>
        <!-- .row end -->
        <div class="row">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="feature-panel">
                    <div class="feature-img bg-yellow">
                        <img src="{{ asset('landing/images/features/bookmark.svg') }}" alt="device">
                    </div>
                    <div class="feature-content">
                        <h3>Launch your campaign & start engaging new users</h3>
                        <p>This should be used to tell a story and let your users know a little more about your
                            product or service.</p>
                        <ul>
                            <li>Enim ad minim veniam, quis nostrud exercitat ullamco.</li>
                            <li>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed doeo eiusmod tempor.
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- .feature-panel end -->
            </div>
            <!-- .col-md-6 end -->
            <div class="col-12 col-md-12 col-lg-6 offset-lg-1">
                <img class="img-fluid pull-right" src="{{ asset('landing/images/features/service-2.svg') }}" alt="device" />
            </div>
            <!-- .col-md-6 end -->

        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #feature2 end -->
<!-- reviews
============================================= -->
<section id="reviews" class="section reviews pb-0 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="carousel carousel-dots owl-carousel" data-slide="1" data-slide-rs="1"
                    data-autoplay="false" data-nav="false" data-dots="true" data-space="0" data-loop="true"
                    data-speed="800">

                    <!-- Testimonial #1 -->
                    <div class="testimonial-panel">
                        <div class="testimonial-body">
                            <p>This should be used to tell a story and include any testimonials you might have
                                about your product or service for your clients.</p>
                            <div class="testimonial-author">
                                <h5>Frank Smith - Envato CEO</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial #2  -->
                    <div class="testimonial-panel">
                        <div class="testimonial-body">
                            <p>This should be used to tell a story and include any testimonials you might have
                                about your product or service for your clients.</p>
                            <div class="testimonial-author">
                                <h5>Jone Doe - Zytheme CEO</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial #3 -->
                    <div class="testimonial-panel">
                        <div class="testimonial-body">
                            <p>Siena has helped us grow our business by optimizing our landing pages. We’ve
                                increased conversion rates by 120%.</p>
                            <div class="testimonial-author">
                                <h5>Bone Datche - 7oroof CEO</h5>
                            </div>
                        </div>
                    </div>

                </div><!-- .carousel End -->
            </div>
        </div>
        <!-- .row End -->
    </div>
    <!-- .container End -->
</section>
<!-- #reviews End-->
<!-- Clients Section
============================================= -->
<section id="clients" class="section clients clients-carousel bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="carousel carousel-dots owl-carousel" data-slide="5" data-slide-res="2"
                    data-autoplay="true" data-nav="false" data-dots="false" data-space="30" data-loop="true"
                    data-speed="800">
                    <!-- Client #1 -->
                    <div class="client">
                        <img class="center-block" src="{{ asset('landing/images/clients/1.png') }}" alt="client">
                    </div>

                    <!-- Client #2 -->
                    <div class="client">
                        <img class="center-block" src="{{ asset('landing/images/clients/2.png') }}" alt="client">
                    </div>

                    <!-- Client #3 -->
                    <div class="client">
                        <img class="center-block" src="{{ asset('landing/images/clients/3.png') }}" alt="client">
                    </div>

                    <!-- Client #4 -->
                    <div class="client">
                        <img class="center-block" src="{{ asset('landing/images/clients/4.png') }}" alt="client">
                    </div>

                    <!-- Client #5 -->
                    <div class="client">
                        <img class="center-block" src="{{ asset('landing/images/clients/5.png') }}" alt="client">
                    </div>
                    <!-- Client #3 -->
                    <div class="client">
                        <img class="center-block" src="{{ asset('landing/images/clients/3.png') }}" alt="client">
                    </div>

                    <!-- Client #4 -->
                    <div class="client">
                        <img class="center-block" src="{{ asset('landing/images/clients/4.png') }}" alt="client">
                    </div>
                </div>
            </div>
            <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #clients end -->
<!-- Pricing Table
============================================= -->
<section id="pricing" class="section pricing bg-gray bg-shape">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="heading heading-1 text--center mb-40">
                    <h2 class="heading-title">No hidden charges choose your plan!</h2>
                </div>
            </div>
            <!-- .col-md-6 end -->
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="pricing-filter">
                    <a href="#" class="monthly is-active">Monthly</a>
                    <a href="#" class="yearly">yearly</a>
                    <span class="switch"></span>
                </div>
            </div>

            <!-- Pricing Packge #1
    ============================================= -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 price-table">
                <div class="pricing-panel">
                    <!--  Pricing heading  -->
                    <div class="pricing-heading text--center">
                        <h4>Starter</h4>
                        <p>free</p>
                    </div>
                    <!--  Pricing body  -->
                    <div class="pricing-body">
                        <ul class="list-unstyled">
                            <li>Up to 10 users monthly</li>
                            <li>A/B testing</li>
                            <li>Limited updates</li>
                        </ul>
                    </div>
                    <!--  Pricing Body  -->
                    <div class="pricing-footer">
                        <a class="btn btn--primary btn--bordered" href="#">Get Started Now</a>
                        <p>Start by trying our service for 30 days free trial no credit card required.</p>
                    </div>
                </div>
            </div>
            <!-- .pricing-table End -->

            <!-- Pricing Packge #2
    ============================================= -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 price-table">
                <div class="pricing-panel pricing-active">
                    <!--  Pricing heading  -->
                    <div class="pricing-heading text--center">
                        <h4>Premium</h4>
                        <div class="pricing-switcher">
                            <p class="pricing-monthly"><span class="currency">$</span>38<span class="period">/
                                    mo</span></p>
                            <p class="pricing-yealry"><span class="currency">$</span>68<span class="period">/
                                    year</span></p>
                        </div>
                    </div>
                    <!--  Pricing body  -->
                    <div class="pricing-body">
                        <ul class="list-unstyled">
                            <li>Up to 10 users monthly</li>
                            <li>Unlimited updates</li>
                            <li>A/B Testing</li>
                        </ul>
                    </div>
                    <!--  Pricing Body  -->
                    <div class="pricing-footer">
                        <a class="btn btn--gradient" href="#">Get Started Now</a>
                        <p>Start by trying our service for 30 days free trial no credit card required.</p>
                    </div>
                </div>
            </div>
            <!-- .pricing-table End -->

            <!-- Pricing Packge #3
    ============================================= -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 price-table">
                <div class="pricing-panel">
                    <!--  Pricing heading  -->
                    <div class="pricing-heading text--center">
                        <h4 class="reveal">Company</h4>
                        <div class="pricing-switcher">
                            <p class="pricing-monthly"><span class="currency">$</span>58<span class="period">/
                                    mo</span></p>
                            <p class="pricing-yealry"><span class="currency">$</span>98<span class="period">/
                                    year</span></p>
                        </div>
                    </div>
                    <!--  Pricing body  -->
                    <div class="pricing-body">
                        <ul class="list-unstyled">
                            <li>Up to 30 users monthly</li>
                            <li>Unlimited updates</li>
                            <li>A/B Testing</li>
                        </ul>
                    </div>
                    <!--  Pricing Body  -->
                    <div class="pricing-footer">
                        <a class="btn btn--primary btn--bordered" href="#">Get Started Now</a>
                        <p>Start by trying our service for 30 days free trial no credit card required.</p>
                    </div>
                </div>
            </div>
            <!-- .pricing-table End -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>

@endsection
