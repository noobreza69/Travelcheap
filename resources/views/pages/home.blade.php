@extends('layouts.app')

@section('title')
TravelCheap
@endsection

@section('content')
  <!-- header -->
    <header class="text-center">
        <h1>
            Pengalaman Travel Terbaik Anda
            <br>
            Dengan Menggunakan Jasa Kami
        </h1>
        <p class="mt-3">
            Dapatkan Harga Spesial
            <br>
            Dan Nikmati Pelayanan Yang Memuaskan
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
    </header>
    
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>100k</h2>
                    <p>Anggota</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Negara</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>1000</h2>
                    <p>Hotel</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partner</p>
                </div>
            </section>
        </div>

        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Tempat Favorit</h2>
                        <p>Tempat Asik Dalam 
                            <br>
                            Menikmati Liburan Anda</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" 
        id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    
                    @foreach ($items as $item )
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center 
                        d-flex flex-column"
                        style="background-image: url('{{$item->gambar->count() ? Storage::url(
                            $item->gambar->first()->img) : ''}}');">
                        <div class="travel-country">{{$item->lokasi}}</div>
                        <div class="travel-location">{{$item->judul}}</div>
                        <div class="travel-button mt-auto">
                            <a href="{{route('detail',$item->slug)}}" class="btn btn-travel-details px-4">
                                Lihat Details
                            </a>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>

        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Partner Kami</h2>
                        <p>
                            Kami Bekerja Sama Dengan
                            <br>
                            Partner-Partner Yang Terpercaya
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="frontend/images/partner.png" 
                        alt="Logo Partner" 
                        class="img-partner">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Para Pelanggan Kami</h2>
                        <p>
                            Pengalaman Mereka 
                            <br>
                            Menggunakan Jasa Kami
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <div class="section-popular-travel row 
                justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testimonial 1.png"
                                 alt="User"
                                 class="mb-4 rounded-circle">
                                 <h3 class="mb-4">Alex</h3>
                                 <p class="testimonial">
                                     Sangat Menyenangkan Bisa Travel
                                     Ke Candi BoroBudur, Terimakasih
                                 </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">
                                Trip To Candi BoroBudur
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testimonial 2.png"
                                 alt="User"
                                 class="mb-4 rounded-circle">
                                 <h3 class="mb-4">Samantha</h3>
                                 <p class="testimonial">
                                     Menyenangkan Bisa Travel Ke
                                     Gunung Bromo Dengan Pelayanan Memuaskan
                                 </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">
                                Trip To Gunung Bromo
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testimonial 4.png"
                                 alt="User"
                                 class="mb-4 rounded-circle">
                                 <h3 class="mb-4">Elizabeth</h3>
                                 <p class="testimonial">
                                     Nikmatnya Menikmati Pemandangan
                                     Di Sore Hari Dipinggir Pantai Bali
                                 </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">
                                Trip To Canggu Bali
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4
                         mt-4 mx-1">
                            Bantuan
                        </a>
                        <a href="{{route('register')}}" class="btn btn-get-started px-4
                         mt-4 mx-1">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection