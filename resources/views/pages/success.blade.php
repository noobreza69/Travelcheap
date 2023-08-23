@extends('layouts.success')
@section('title','Checkout Berhasil')

@section('content')

<main>
      <div class="section-success d-flex align-item-center">
          <div class="col text-center">
              <img src="{{url('frontend/images/ceklis.png')}}">
              <h1>Pembayaran Berhasil</h1>
              <p>
                  Kami akan mengirim instruksi trip 
                  <br/>
                  melalu email yang anda berikan
              </p>
              <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5" > 
                  Kembali Ke Awal
              </a>
          </div>
      </div>
  </main>


@endsection



   
       

            
     
  