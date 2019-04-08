@extends('layouts.master')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
			 <div class="box">
             @foreach ($datakatalog as $row2)

	   <form action="{{ url('updatekatalog/'.$row2->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
	   {{ csrf_field() }}
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tags"></i> Form edit data produk</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
		<div class="box-body">
              
        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> ID Katalog </span>
                    <input title="ID Katalog"type="text" name="id" autocomplete="off" required class="form-control" value="{{$row2->id}}">
			</div><br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i>Pict </span>
                    <input title="Pict"type="text" name="pict" autocomplete="off" required class="form-control" value="{{$row2->pict}}">
			</div><br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> Nama Produk </span>
                    <input title="Nama Produk"type="text" name="nama_produk" autocomplete="off" required class="form-control" value="{{$row2->nama_produk}}">
			</div><br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> Detail </span>
                    <input title="Detail"type="text" name="detail" autocomplete="off" required class="form-control" value="{{$row2->detail}}">
			</div><br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i>Harga </span>
                    <input title="Harga"type="text" name="harga" autocomplete="off" required class="form-control" value="{{$row2->harga}}">
			</div><br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i>Stok </span>
                    <input title="Stok"type="text" name="stok" autocomplete="off" required class="form-control" value="{{$row2->stok}}">
			</div><br>
				
		</div>
        <div class="box-footer">
			<div class="col-md-offset-10 col-md-9">		
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
		
        </div>
		</form>
		</div>
      </div>
      </div>
</section>
    @endforeach	
@endsection