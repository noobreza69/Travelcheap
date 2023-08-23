@extends ('layouts.admin')

@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">detail Transaksi {{$item->user->name}}</h1>
                        
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
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{$item->id}}</td>
                                </tr>
                                <tr>
                                    <th>Paket Travel</th>
                                    <td>{{$item->paket_travel->judul}}</td>
                                </tr>
                                <tr>
                                    <th>Pelanggan</th>
                                    <td>{{$item->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Visa Tambahan</th>
                                    <td>Rp.{{$item->visa_tambahan}}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>Rp.{{$item->total}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{$item->status}}</td>
                                </tr>
                                <tr>
                                    <th>Pembelian</th>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Negara</th>
                                                <th>Visa</th>
                                                <th>DOE Passport</th>
                                            </tr>
                                            @foreach ($item->details as $detail)
                                                
                                                <tr>
                                                    <td>{{$detail->id}}</td>
                                                    <td>{{$detail->username}}</td>
                                                    <td>{{$detail->negara}}</td>
                                                    <td>{{$detail->is_visa? '30 Hari' : 'N/A'}}</td>
                                                    <td>{{$detail->doe_passport}}</td>
                                                </tr>    

                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    


                </div>
                <!-- /.container-fluid -->
@endsection