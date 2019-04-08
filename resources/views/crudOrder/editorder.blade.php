@extends('layouts.master')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
			 <div class="box">
             @foreach ($dataorder as $row2)

	   <form action="{{ url('updateorder/'.$row2->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
	   {{ csrf_field() }}
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tags"></i> Form edit data detail order</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
		<div class="box-body">
              
				<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> ID Order </span>
                <input title="ID Order"type="text" name="id" autocomplete="off" required class="form-control" value="{{$row2->id}}">
				</div><br>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> Jumlah Order </span>
                <input title="Jumlah Order"type="text" name="jumlah_order" autocomplete="off" required class="form-control" value="{{$row2->jumlah_order}}">
				</div><br>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> Harga </span>
                <input title="harga"type="text" name="harga" autocomplete="off" required class="form-control" value="{{$row2->harga}}">
				</div><br>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> Harga Total </span>
                <input title="harga total"type="text" name="harga_total" autocomplete="off" required class="form-control" value="{{$row2->harga_total}}">
				</div><br>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i> Tanggal Waktu Order </span>
                <input title="tanggal waktu"type="datetime" name="tanggal_waktu_order" autocomplete="off" required class="form-control" value="{{$row2->tanggal_waktu_order}}">
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