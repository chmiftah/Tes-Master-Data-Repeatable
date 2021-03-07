@extends('layouts.admin')

@section('main-content')

    <div class="row">
      @if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
@endif

      <div class="col-lg-12">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Input Data Transaksi</h6>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('transaksi.post') }}" autocomplete="off">
                    @csrf
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-lg-3">
                                    <label class="form-control-label" for="name">Description<span class="small text-danger">*</span></label>
                                  </div>
                                  <div class="col-lg-9">
                                    <textarea  id=""  class="form-control" cols="30" rows="5" name="description" id="description"></textarea>
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
                                 <input type="number" class="form-control" name="code" id="code">
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
                                 <input type="number" class="form-control" name="rate" id="rate">
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
                                 <input type="date" class="form-control" name="date_paid" id="date_paid">
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
                                            <option disabled selected>pilih kategori</option>
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
                                                 <th></th>
                                               </tr>
                                               <tr>
                                                 <td>
                                                   <input type="text" name="nama_transaksi[]"  class="form-control">
                                                   @error('nama_transaksi[]')
                                                   <div class="text-danger text-xs mt-2">input nama transaksi</div>
                                                   @enderror
                                                  </td>
                                                 <td>
                                                   <input type="number" name="nominal[]" class="form-control">
                                                   @error('nominal[]')
                                                   <div class="text-danger text-xs mt-2">input nominal</div>
                                                   @enderror
                                                  </td>
                                                 <td><div class="btn btn-info btn-xl" id="add-btn"><i class="fas fa-plus  fa-2x"></i></td>
                                               </tr>

                                             </table>

                                            </div>

                                          </div>

                                      </div>


                                    </div>

                                   </div>

                                 </div>
                                 <div class="card element"  id='div_1'>
                                </div>
                                <div class="row d-flex justify-content-end my-3">
                                  <span class="btn btn-primary add text-right"><i class="fas fa-plus"></i> add</span>
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
                                  <button type="submit" class="btn btn-primary my-5">Simpan</button>
                                  <button type="reset" class="btn btn-danger my-5">Reset</button>
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
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>

<script>
$(document).ready(function () {

  $(".add").click(function(){
    var total_element = $(".element").length;
    var lastid = $(".element:last").attr("id");
    var split_id = lastid.split("_");
    var nextindex = Number(split_id[1]) + 1;
     $(".element:last").after("<div class='element' id='div_"+ nextindex +"'></div>");
     $("#div_" + nextindex).append(`
    <div class='card my-4 box'>
    <div class='card-header'>
    <div class='row d-flex justify-content-end'>
    <span class='btn btn-danger remove' id='remove_` + nextindex + `'>X</span></div>
    <div class='row'>

        <div class='col-lg-2'>
        <label class='form-control-label' for='name'>Category<span class='small text-danger'>*</span></label>
        </div>
     <div class='col-lg-8'>
     <div class='col-lg-4'>
     <select class='form-control mb-4'>
      <option>Income</option><option>Expense
      </option>
    </select>

    </div>
    <div class='col-lg-9'>
    <div class='card'>
    <table class='el'  id='div_1'>
    <tr>
    <th>Nama Transaksi</th>
    <th>Jumlah</th>
    </tr>
    <tr>
      <td><input type='text' name='nama_transaksi[]' class='form-control'></td>
      <td><input type='number' name='nominal[]'  class='form-control'></td>
      <td><div class='btn btn-info child'><i class="fas fa-plus  fa-2x"></div></td>

    </tr>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>`);
  });


   $('.box').on('click','.remove',function(){
     var id = this.id;
     var split_id = id.split("_");
     var deleteindex = split_id[1];
   $("#div_" + deleteindex).remove();
  });
  var i = 0;
  $("#add-btn").click(function(){
  ++i;
  $("#parent").append(`<tr>
  <td>
  <input type="text" name="nama_transaksi[]" class="form-control" />
  </td>
  <td>
  <input type="number" name="nominal[]"  class="form-control" />
  </td>
  <td>
  <button type="button" class="btn btn-danger remove-tr"><i class="fas fa-trash-alt  fa-2x"></button></td></tr>`);
  });
  $(document).on('click', '.remove-tr', function(){
  $(this).parents('tr').remove();
  });



  $(document).on('click', '.child', function(){
  ++i;
  $(".el").append(`<tr>
  <td>
  <input type="text" name="nama_transaksi[]"  class="form-control" />
  </td>
  <td>
  <input type="number" name="nominal[]"  class="form-control" />
  </td>
  <td>
  <button type="button" class="btn btn-danger remove-tr"><i class="fas fa-trash-alt  fa-2x"></button></td></tr>`);
  });

  $('.el').on('click','.addss',function(){
  var total_el = $(".el").length;
  var lastid = $(".el:last").attr("id");
  var split_id = lastid.split("_");
  var nextindex = Number(split_id[1]) + 1;

  $(".el:last").after("<div class='el' id='div_"+ nextindex +"'></div>");
  $("#div_" + nextindex).append(`<div class='card my-5'><div class='card-body'><div>Kotak Kecil</div><div class='text-right'><button id='remove_` + nextindex + `' class='btn btn-danger remove'>hapus</button></div></div></div>`);
  });
});

</script>
