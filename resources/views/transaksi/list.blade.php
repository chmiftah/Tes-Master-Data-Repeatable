@extends('layouts.admin')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>
    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="row d-flex justify-content-between mb-3">
                    <div>
                      <a href="{{ route('transaksi') }}" class="btn btn-primary"><i class="fas fa-plus "></i> Add Data</a>
                    </div>
                    <div class="d-flex">
                      <form action="/transaksi/cari_tgl" method="GET">
                      <div class="d-flex mr-4">
                      <input type="date" name="date1" required  class="form-control mx-1" style="width:130px">
                      <h5 class="p-2">to</h5>
                      <input type="date" name="date2" required   class="form-control mx-1" style="width:130px">
                      <button class="btn btn-primary mx-1">Go</button>
                    </div>
                     </form>
                     <form action="/transaksi/filter" method="GET">
                      <select name="filter" id=""  class="form-control mr-3"  onchange="javascript:this.form.submit()" style="width:100px">
                        <option disabled selected>Order By</option>
                        <option value="asc" >income ASC    <i class="fa fa-arrow-down"></i></option>
                        <option value="desc" >income DESC  <i class="fa fa-arrow-up"></i></option>

                      </select>
                    </form>
                        <form action="/transaksi/cari" method="GET">
                          <div class="d-flex">
                            <input type="text" required name="cari"  class="form-control input-sm mx-1" style="width:150px;">
                            <button class="btn btn-primary">cari</button>
                          </div>
                          </form>
                    </div>
                  </div>
                    <div class="row">
                       <table class="table table-striped">
                         <tr>
                           <th>No</th>
                           <th>Deskripsi</th>
                           <th>Code</th>
                           <th>Rate Euro</th>
                           <th>Date Paid</th>
                           <th>Kategori</th>
                           <th>Nama Transaksi</th>
                           <th>Nominal (IDR)</th>
                           <th>Aksi</th>
                         </tr>
                         @if (count($transaksi))
                         @foreach ($transaksi as $data)
                         <tr>
                        <td>1</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->code }}</td>
                        <td>{{ $data->rate }}</td>
                        <td>{{ $data->date_paid }}</td>
                        <td>{{ $data->kategori }}</td>
                        <td>{{ $data->nama_transaksi }}</td>
                        <td>{{ $data->nominal }}</td>
                        <td>


                          <form  action="{{ route('transaksi.delete',$data) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm" href="{{ route('transaksi.edit', $data) }}" > <i class="fas fa-pencil-alt fa-sm"></i></a>
                            <button class="btn-sm btn btn-danger" type="submit" onclick="javascript:return confirm('yakin hapus data?')" > <i class="fas fa-trash-alt fa-sm"></i></button>
                        </form>
                        </td>
                        </tr>
                         @endforeach
                         @else
                         <tr>
                          <td><div class="alert alert-danger">data tidak ditemukan</div></td>
                         </tr>
                         @endif
                       </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between">
          <div>
            pages: {{ $transaksi->currentPage() }} | total : {{ $transaksi->total() }} data
          </div>
          <div>{{ $transaksi->links() }}</div>
        </div>
    </div>




@endsection