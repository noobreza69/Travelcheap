@extends ('layouts.admin')

@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Gambar</h1>
                        
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
                            <form action="{{route('gambar.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="paket_travel_id">Paket Travel</label>
                                    <select name="paket_travel_id" required class="form-control">
                                    
                                    <option value="">PILIH</option>
                                    @foreach ($paket_travel as $pt )
                                    <option value="{{$pt->id}}">
                                    {{$pt->judul}}
                                    </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="img">Gambar</label>
                                    <input type="file" class="form-control" name="img" placeholder="Gambar" class="form-control">
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