@extends('layouts.landing')

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
                        @guest
                        
                        @else
                        @if (auth()->user()->level=="penyedia")
                        <a class="btn btn--primary btn--bordered" href="{{url('/create/event')}}">Tambah Event</a>
                        @endif
                        @endguest
                        
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($event as $item)
                <!-- Panel #1 -->
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="feature-panel">
                        <div class="feature-img bg-blue">
                            @if ($item->image_url == null)
                            <a href="{{url('detail-event', $item->id)}}">
                                <img src="{{ asset('landing/images/features/champion.svg') }}" alt="target">
                            </a>
                            @else
                            <a href="{{url('detail-event', $item->id)}}">
                                <img src="{{ asset($item->image_url) }}" style="height: 125px" alt="target">
                            </a>
                            @endif
                        </div>
                        <div class="feature-content">
                            <h3 class="text-capitalize">{{$item->event_name}}</h3>
                            <p>Hari, Tanggal: Sabtu, 17 Oktober 2020 Waktu: Pukul 09.30 WIB-selesai Live on Zoom</p>
                        </div>
                    </div>
                    <!-- .feature-panel end -->
                </div>
                <!-- .col-md-4 end -->
                @endforeach
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #feature1 end -->
    
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
                
                <!-- .container end -->
            </section>
        </center>
        <!-- #feature2 end -->
        
        
        @endsection
        