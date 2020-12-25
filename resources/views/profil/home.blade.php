@extends('layouts.landing1')

@section('title', "Landing")

@section('content')
<center>
    <section id="hero" class="section hero">
        <div class="container">
            <div>
                <div class="col-50  col-md-12 col-lg-10 center">
                    <div class="hero-headline mt-10" style="color:#F96145" >Space-For.Me</div>
                    <div class="display-4">Sebuah layanan penyediaan pendaftaran peserta, presensi kehadiran, pembagian sertifikat dan validasi keaslian sertifikat dapat dilakukan melalui 1 platform.</div>
                </div>
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
</center>
<!-- #slider end -->
<!-- Feature #1
    ============================================= -->
    <section id="feature1" class="section feature feature-center bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading heading-1 text--center mb-80">
                        <h2 >
                            Event Web-Seminar
                        </h2>
                        <h5>Daftar Web-Seminar disini, dan ikuti Event-nya!</h5>
                        @if (auth()->user()->level=="penyedia")
                        <a class="btn btn--primary btn--bordered" href="{{url('/create/event')}}">ADD EVENT</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Panel #1 -->
                @foreach ($data as $d)
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="feature-panel">
                        <div class="feature-img bg-blue">
                            @if ($d->image_url === null)
                            <a href="{{url('detail-event', $d->id)}}">
                                <img src="{{ asset('landing/images/features/champion.svg') }}" alt="target">
                            </a>
                            @else
                            <a href="{{url('detail-event', $d->id)}}">
                                <img src="{{ asset($d->image_url) }}" style="height: 125px" alt="target">
                            </a>
                            @endif
                        </div>
                        <div class="feature-content">
                            <h3>{{$d->event_name}}</h3>
                            <p>Tanggal {{$d->start_date}} Jam {{$d->start_time}}</p>
                            @if (auth()->user()->level == 'penyedia' && $d->user_id == auth()->user()->id)
                            <a href="{{route('penyedia.edit_event', $d->id)}}">Edit</a>
                            <a href="{{route('penyedia.delete_event', $d->id)}}">Delete</a>
                            @endif
                        </div>
                    </div>
                    <!-- .feature-panel end -->
                </div>
                @endforeach
                <!-- Panel #3 -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #feature1 end -->
    @if (auth()->user()->level=="penyedia")
    <center>
        <section id="pricing" class="section pricing bg-gray bg-shape">
            <div class="container">
                <!-- .row end -->
                <div class="row">
                    <!-- Pricing Packge #1
                        ============================================= -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 price-table">
                            <div class="pricing-panel ">
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
                                        
                                        <!-- .row end -->
                                    </div>
                                </div>
                                <!-- .container end -->
                            </section>
                        </center>
                        @endif
                        <!-- Feature #2
                            ============================================= -->
                            <center>
                                <section id="feature2" class="section feature feature-2 bg-shape">
                                    <div class="container">
                                        <div class="row">
                                            <!-- .col-md-6 end -->
                                            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 center">
                                                <div class="feature-panel mt-80 ">
                                                    <div class="footer-logo">
                                                        <img class="logo" src="{{ asset('landing/images/logo/logo-full.png') }}" alt="Siena Logo">
                                                    </div>
                                                    <div class="feature-content">
                                                        <p>Space-For.Me merupakan sebuah platform untuk pengelolaan event dari tahap pra event
                                                            dan pasca event. Melalui layanan penyediaan pendaftaran peserta, presensi kehadiran,
                                                            pembagian sertifikat dan validasi keaslian sertifikat dapat dilakukan melalui satu platform yaitu Space-For.Me.</p>
                                                        </div>
                                                    </div>
                                                    <!-- .feature-panel end -->
                                                </div>
                                                <!-- .col-md-6 end -->
                                            </div>
                                            <div class="clearfix mt-100 pt-150"></div>
                                        </div>
                                        <div style="background: white">
                                            <h1>Sponsor</h1>
                                        </div>
                                        <!-- .container end -->
                                    </section>
                                </center>
                                <!-- #feature2 end -->
                                
                                
                                @endsection
                                