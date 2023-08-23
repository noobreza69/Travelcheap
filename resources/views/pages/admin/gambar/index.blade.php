@extends ('layouts.admin')

@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gambar</h1>
                        <a href="{{route('gambar.create')}}" 
                        class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50">
                            Tambah
                        </i>
                        </a>
                    </div>  

                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" 
                                width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Travel</td>
                                            <td>Gambar</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                            @forelse ($items as $item)
                                            <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->paket_travel->judul}}</td>
                                            
                                            <td>
                                                <img src="{{Storage::url($item->img)}}" alt=""
                                                style="width:150px" class="img-thumbnail"/>
                                            </td>
                                            <td>
                                                <a href="{{route('gambar.edit',$item->id)}}"
                                                    class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{route('gambar.destroy',$item->id)}}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
         
                                            </td> 
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    Data Kosong
                                                </td>       
                                            </tr> 
                                            @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
@endsection