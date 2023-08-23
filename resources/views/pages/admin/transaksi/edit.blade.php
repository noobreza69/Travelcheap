@extends ('layouts.admin')

@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data {{$item->judul}}</h1>
                        
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
                            <form action="{{route('transaksi.update', $item->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" required class="form-control">
                                        <option value="{{$item->status}}">
                                        HEHEEEEH({{$item->status}})
                                        </option>
                                        <option value="IN_CART">In_cart</option>
                                        <option value="SUCCESS">SUCCESS</option>
                                        <option value="PENDING">PENDING</option>
                                        <option value="CANCEL">CANCEL</option>
                                        <option value="FAILED">FAILED</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Edit Data
                                </button>
                            </form>
                        </div>
                    </div>
                    


                </div>
                <!-- /.container-fluid -->
@endsection