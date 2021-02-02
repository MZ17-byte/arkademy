<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>arcamedy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center mt-5">
                <h1>Daftar Produk</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                   Tambah Produk
                  </button>
            </div>
            <div class="col-lg-12 mt-5">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          @foreach ($produk as $item)
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{ $item->nama_produk }}</td>
                          <td>{{ $item->keterangan }}</td>
                          <td>Rp.{{ $item->harga }}</td>
                          <td>{{ $item->jumlah }}</td>
                          <td>
                            <button data-toggle="modal" class="btn btn-warning text-light" data-target="#modalEdit" data-nama="{{ $item->nama_produk }}" data-keterangan="{{ $item->keterangan }}" data-harga="{{ $item->harga }}" data-jumlah="{{ $item->jumlah }}" data-id="{{ $item->id_produk }}"> Edit</button>&nbsp;
                            <button type="button"  data-id="{{ $item->id_produk }}" data-toggle="modal" data-target="#modalHapus" class="btn btn-danger"> Hapus</button>
                          </td>      
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                 

  
                <!-- Modal Tambah -->
                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/tambahProduk')}}"  method="post">
                                @csrf 
                                <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="namaProduk" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" name="harga">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah">
                                </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Produk</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>



                            <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/editProduk') }}" method="post">
                                @csrf
                                <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="hidden" id="id_produk" name="id_produk">
                                <input type="text" class="form-control" id="namaProduk" name="namaProduk" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                                </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>


              
  
                <!-- Modal Hapus-->
                <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-content">
                            <div class="modal-header" style="text-align: center; font-family: Segoe UI;">
                                <form role="form" action="{{ url('/hapusProduk') }}" method="post">
                                    @csrf
                                   <input type="hidden" name="id_produk" id="id_produk">
                                   <h5 class="modal-title">Apakah Anda Yakin Ingin Menghapus Data ?</h4>                                                           
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">TIDAK</button>
                                <button type="submit" class="btn btn-success">YA</button>
                            </div>
                                </form>
                        </div>
                    </div>
                    </div>
                </div>



  
            </div>
        </div>
    </div>
    
</body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $('#modalEdit').on('show.bs.modal', function(event){
        console.log("berhasil")
        var button =$(event.relatedTarget)
        var id = button.data('id')
        var nama_produk = button.data('nama')
        var keterangan = button.data('keterangan')
        var harga = button.data('harga')
        var jumlah = button.data('jumlah')
        var modal = $(this)

        modal.find('.modal-body #id_produk').val(id)    
        modal.find('.modal-body #namaProduk').val(nama_produk)
        modal.find('.modal-body #keterangan').val(keterangan)
        modal.find('.modal-body #harga').val(harga)
        modal.find('.modal-body #jumlah').val(jumlah)

    });
    $('#modalHapus').on('show.bs.modal', function(event){
		var button =$(event.relatedTarget)
		var id = button.data('id')
		var modal = $(this)
		modal.find('.modal-content #id_produk').val(id)

	});

    
    </script>
    <script>
		@if(Session::has('message'))
		 var type = "{{ Session::get('alert-type', 'info') }}";
		 
		 switch(type){
			 case 'error':
			 toastr.error("{{ Session::get('message') }}");
			 break;
			 case 'success':
			 toastr.success("{{ Session::get('message') }}");
			 break;
		 }
	   @endif
   </script>
    
</html>