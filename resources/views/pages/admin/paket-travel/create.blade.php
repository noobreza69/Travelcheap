@extends ('layouts.admin')

@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
                        
                    </div>  

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div> 
                    @endif

                    <div class="card-shadow">
                        <div class="card-body">
                            <form action="{{route('paket-travel.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{old('judul')}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="{{old('lokasi')}}">
                                </div>
                                <div class="form-group">
                                     <label for="tentang">Tentang</label>
                                    <textarea name="tentang" rows="10" class="d-block w-100 form-control">
                                        {{old('tentang')}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="event">Event</label>
                                    <input type="text" class="form-control" name="event" placeholder="Event" value="{{old('event')}}">
                                </div>
                                <div class="form-group">
                                    <label for="bahasa">Bahasa</label>
                                    <input type="text" class="form-control" name="bahasa" placeholder="Bahasa" value="{{old('bahasa')}}">
                                </div>
                                <div class="form-group">
                                    <label for="makanan">Makanan</label>
                                    <input type="text" class="form-control" name="makanan" placeholder="Makanan" value="{{old('makanan')}}">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_berangkat">Keberangkatan</label>
                                    <input type="date" class="form-control" name="tgl_berangkat" placeholder="Keberangkatan" value="{{old('tgl_berangkat')}}">
                                </div>
                                <div class="form-group">
                                    <label for="durasi">Durasi</label>
                                    <input type="text" class="form-control" name="durasi" placeholder="Durasi" value="{{old('durasi')}}">
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe</label>
                                    <input type="text" class="form-control" name="tipe" placeholder="Tipe" value="{{old('tipe')}}">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga" value="{{old('harga')}}">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Simpan Data
                                </button>
                            </form>
                        </div>
                    </div>
                    


                </div>
                <!-- /.container-fluid -->
@endsection