@extends ('layouts.admin')

@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
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
                                            <td>User</td>
                                            <td>Visa</td>
                                            <td>Total</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                            @forelse ($items as $item)
                                            <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->paket_travel->judul}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->visa_tambahan}}</td>
                                            <td>{{$item->total}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a href="{{route('transaksi.show',$item->id)}}"
                                                    class="btn btn-primary">
                                                <i class="fa fa-search"></i>
                                                </a>
                                                <a href="{{route('transaksi.edit',$item->id)}}"
                                                    class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{route('transaksi.destroy',$item->id)}}"
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