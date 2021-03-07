
@extends('layouts.admin')

@section('main-content')

    <div class="row">
      <div class="col-lg-12">

          <div class="card shadow mb-4">

              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Transaksi</h6>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('transaksi.update',$transaksi) }}" autocomplete="off">
                    @method('PUT')
                    @csrf
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-lg-3">
                                    <label class="form-control-label" for="name">Description<span class="small text-danger">*</span></label>
                                  </div>
                                  <div class="col-lg-9">
                                    <textarea  id=""  class="form-control" cols="30" rows="5" name="description" id="description">{{ old('description') ??$transaksi->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-lg-3">
                                    <label class="form-control-label" for="code">Code<span class="small text-danger">*</span></label>
                                  </div>
                                  <div class="col-lg-9">
                                 <input type="number" class="form-control" name="code" id="code" value="{{old('code') ?? $transaksi->code }}">
                                 @error('code')
                                 <div class="text-danger text-sm mt-2">{{ $message }}</div>
                                 @enderror
                                  </div>
                                </div>
                                <div class="row my-4">
                                  <div class="col-lg-3">
                                    <label class="form-control-label" for="rate">Rate Euro<span class="small text-danger">*</span></label>
                                  </div>
                                  <div class="col-lg-9">
                                 <input type="number" class="form-control" name="rate" id="rate" value="{{old('rate') ??$transaksi->rate}}">
                                 @error('rate')
                                 <div class="text-danger text-sm mt-2">{{ $message }}</div>
                                 @enderror
                                  </div>
                                </div>
                                <div class="row my-4">
                                  <div class="col-lg-3">
                                    <label class="form-control-label" for="date_paid">Date Paid<span class="small text-danger">*</span></label>
                                  </div>
                                  <div class="col-lg-9">
                                 <input type="date" class="form-control" name="date_paid" id="date_paid" value="{{old('date_paid') ?? $transaksi->date_paid }}">
                                 @error('date_paid')
                                 <div class="text-danger text-sm mt-2">{{ $message }}</div>
                                 @enderror
                                  </div>
                                </div>
                              </div>
                          </div>

                          <div class="row box">
                            <div class="col-lg-12">
                              <div class="card shadow">
                                <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                                </div>
                                <div class="card-body">

                                 <div class="card">
                                   <div class="card-header">


                                    <div class="row">
                                      <div class="col-lg-2">
                                        <label class="form-control-label" for="kategori">Category<span class="small text-danger">*</span></label>
                                      </div>
                                      <div class="col-lg-8">
                                        <div class="col-lg-4">
                                          <select class="form-control " name="kategori" id="kategori">
                                            <option value="{{old('kategori') ?? $transaksi->kategori }}">{{old('kategori') ??$transaksi->kategori }}</option>
                                           <option value="income">Income</option>
                                           <option value="expense">Expense</option>
                                          </select>
                                          @error('kategori')
                                          <div class="text-danger text-sm mb-4 ">{{ $message }}</div>
                                          @enderror
                                       </div>

                                          <div class="col-lg-9 mt-4">
                                            <div class="card">
                                             <table id="parent" class="table">
                                               <tr>
                                                 <th>Nama Transaksi</th>
                                                 <th>Jumlah</th>

                                               </tr>
                                               <tr>
                                                 <td>
                                                   <input type="text" name="nama_transaksi"  class="form-control" value="{{old('nama_transaksi') ?? $transaksi->nama_transaksi }}">
                                                   @error('nama_transaksi')
                                                   <div class="text-danger text-xs mt-2">input nama transaksi</div>
                                                   @enderror
                                                  </td>
                                                 <td>
                                                   <input type="number" name="nominal" class="form-control" value="{{old('nominal') ?? $transaksi->nominal }}">
                                                   @error('nominal')
                                                   <div class="text-danger text-xs mt-2">input nominal</div>
                                                   @enderror
                                                  </td>

                                               </tr>
                                             </table>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                   </div>
                                 </div>

                                </div>

                              </div>
                            </div>

                          </div>
                      </div>

                      <!-- Button -->
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-primary my-5">Save Changes</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>


    <!-- End of Main Content -->
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@endpush



