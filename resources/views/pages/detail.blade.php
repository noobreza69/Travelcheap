@extends('layouts.app')
@section('title','Detail Perjalanan')

@section('content')


    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pd-lg-0">
                        <div class="card card-details">
                            <h1>{{$item->judul}}</h1>
                            <p>
                                {{$item->lokasi}}
                            </p>
                            @if ($item->gambar->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img 
                                    src="{{Storage::url($item->gambar->first()->img)}}" 
                                    class="xzoom"
                                    id="xzoom-default" 
                                    xoriginal="{{Storage::url($item->gambar->first()->img)}}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->gambar as $gambar )
                                    <a href="{{Storage::url($gambar->img)}} ">
                                        <img 
                                        src="{{Storage::url($gambar->img)}} " 
                                        class="xzoom-gallery"
                                        width="125" 
                                        xpreview="{{Storage::url($gambar->img)}} ">
                                    </a>
                                    @endforeach
                                    
                                </div>
                            </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                            {!! $item->tentang !!}
                            <div class="features row">
                                <div class="col-md-4">
                                    <img 
                                    src="{{url('frontend/images/event.png')}}" 
                                    alt="" 
                                    class="features-image" >
                                    <div class="description">
                                        <h3>Event</h3>
                                        <p>{{$item->event}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img 
                                    src="{{url('frontend/images/language.png')}}" 
                                    alt="" 
                                    class="features-image" >
                                    <div class="description">
                                        <h3>Bahasa</h3>
                                        <p>{{$item->bahasa}}</p>
                                    </div>
                                </div> <div class="col-md-4 border-left">
                                    <img 
                                    src="{{url('frontend/images/food.png')}}" 
                                    alt="" 
                                    class="features-image" >
                                    <div class="description">
                                        <h3>Makanan</h3>
                                        <p>{{$item->makanan}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2> Peserta yang ikut </h2>
                            <div class="members my-2">
                                <img src="frontend/images/member (1).png"  
                                class="member-image mr-1"/>
                                <img src="frontend/images/member (2).png"  
                                class="member-image mr-1">
                                <img src="frontend/images/member (3).png"  
                                class="member-image mr-1">
                                <img src="frontend/images/member (4).png"  
                                class="member-image mr-1">
                                <img src="frontend/images/member (5).png"  
                                class="member-image mr-1">
                            </div>
                            <hr>
                            <h2>Informasi</h2>
                            <table class="trip-information">
                                <tr>
                                    <th widht="50%"> Tanggal Pergi </th>
                                    <td width="50%" class="text-right">
                                        {{\Carbon\Carbon::create($item->tgl_berangkat)->format('n F, Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th widht="50%"> Durasi </th>
                                    <td width="50%" class="text-right">
                                        {{$item->durasi}}
                                    </td>
                                </tr>
                                <tr>
                                    <th widht="50%"> Tipe </th>
                                    <td width="50%" class="text-right">
                                        {{$item->tipe}}
                                    </td>
                                </tr>
                                <tr>
                                    <th widht="50%"> Harga </th>
                                    <td width="50%" class="text-right">
                                        Rp.{{$item->harga}} / Orang
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                                <form action="{{route('checkout_process',$item->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                        Bergabung Sekarang
                                    </button>
                                </form>
                            @endauth

                            @guest
                            <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                               Login Or Register
                            </a>
                            @endguest
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
  
@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
  <script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script> 
    <script>
        $(document).ready(function(){
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 650,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush