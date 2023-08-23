@extends('layouts.checkout')
@section('title','Checkout')

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
                                <li class="breadcrumb-item ">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pd-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error )
                                    <li>{{error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <h1>Member Yang Berangkat</h1>
                            <p>
                                Tujuan ke {{$item->paket_travel->judul}},{{$item->paket_travel->lokasi}}
                            </p>
                            <div class="attendee">
                                <table class="table table-resposive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Foto</td>
                                            <td>Nama</td>
                                            <td>Negara</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                        <tr>
                                            <td><img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60"
                                                class="rounded-circle"></td>
                                            <td class="align-middle">{{$detail->username}}</td>
                                            <td class="align-middle">{{$detail->negara}}</td>
                                            <td class="align-middle">{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                            <td class="align-middle">
                                                {{\Carbon\Carbon::createFromDate($detail->doe_passport) > 
                                                \Carbon\Carbon::now() ? 'Aktif' : 'Tidak Aktif'}}</td>
                                            <td class="align-middle">
                                                <a href="{{route('checkout_remove', $detail->id)}}">
                                                    <img src="{{url('frontend/images/x.png')}}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    Tidak Ada
                                                </td>
                                            </tr>
                                        @endforelse
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2> Tambah Anggota </h2>
                                <form  class="form-inline" method="POST" 
                                action="{{route('checkout-create',$item->id)}}">
                                @csrf
                                    <label for="username" class="sr-only">
                                        Nama
                                    </label>
                                    <input type="text" 
                                    name="username"
                                    class="form-control mb-2 mr-sm-2" 
                                    id="username"
                                    required
                                    placeholder="Username">

                                    <label for="negara" class="sr-only">
                                        Negara
                                    </label>
                                    <input type="text" 
                                    name="negara"
                                    class="form-control mb-2 mr-sm-2" 
                                    style="width: 50px"
                                    id="negara"
                                    required
                                    placeholder="Negara">

                                    <label for="is_visa" 
                                    class="sr-only">
                                       Visa
                                    </label>
                                    <select name="is_visa" 
                                    id="is_visa"
                                    required 
                                    class="custom-select mb-2 mr-sm-2">
                                    <option value="" selected>VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>

                                <label for="doe_passport" 
                                class="sr-only">Doe Passport</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input 
                                    type="text" 
                                    class="form-control datepicker" 
                                    name="doe_passport"
                                    id="doe_passport" 
                                    placeholder="DOE Passport"/>
                                </div>

                                <button type="submit" class="btn btn-add-now mb-2 px-4">
                                    Tambah
                                </button>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    Hanya bisa mengundang member yang sudah terdaftar
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            
                            <h2>Checkout</h2>
                            <table class="trip-information">
                                <tr>
                                    <th widht="50%"> Anggota </th>
                                    <td width="50%" class="text-right">
                                       {{$item->details->count()}} Orang
                                    </td>
                                </tr>
                                <tr>
                                    <th widht="50%"> Visa Tambahan </th>
                                    <td width="50%" class="text-right">
                                      Rp. {{$item->visa_tambahan}}
                                    </td>
                                </tr>
                                <tr>
                                    <th widht="50%"> Harga </th>
                                    <td width="50%" class="text-right">
                                       Rp. {{$item->paket_travel->harga}}
                                    </td>
                                </tr>
                                <tr>
                                    <th widht="50%"> Sub Total </th>
                                    <td width="50%" class="text-right">
                                       Rp. {{$item->total}}
                                    </td>
                                </tr>
                                <tr>
                                    <th widht="50%"> Total </th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">Rp.{{$item->total}}</span>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            <hr />
                            <h2>Metode Pembayaran</h2>
                            <p class="payment-instruction">Silahkan Selesaikan Pembayaran
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/pembayaaran.png')}}" alt="" 
                                    class="bank-image">
                                    <div class="description">
                                        <h3>PT TravelCheap</h3>
                                        <p>55511000
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix">

                                    </div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/pembayaaran.png')}}" alt="" 
                                    class="bank-image">
                                    <div class="description">
                                        <h3>PT TravelCheap</h3>
                                        <p>55511222
                                            <br>
                                            Bank Negara Indonesia
                                        </p>
                                    </div>
                                    <div class="clearfix">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{route('checkout_success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">
                                Pembayaran Selesai
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('detail',$item->paket_travel->slug)}}" class="text-muted">
                                Batalkan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}"/>

@endpush

@push('addon-script')
  <script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function(){

            $('.datepicker').datepicker({
                format:'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons:{
                    rightIcon: '<img src="{{url('frontend/images/calender.png')}}"/>'
                }
            })
        });
    </script>
    
@endpush

   
       

            
     
  