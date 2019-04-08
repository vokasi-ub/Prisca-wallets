@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">KATALOG</h3>
              <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                      </span>
                  </div>
              </form>
              <a href="{{url('tambahdatakatalog')}}"> Create </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" style="width: auto">
                <tr>
                  <th>ID Katalog</th>
                  <th>Foto Produk</th>
                  <th>Nama Produk</th>
                  <th>Detail</th>
                  <th>Harga Produk</th>
                  <th>Stok</th>
                  <th>Options</th>
                </tr>
                <?php $no=1; ?>
                @foreach ($datakatalog as $row)
                <tr>
            
                    <th>{{ $row->id }}</th>
                    <th>{{ $row->pict }}</th>
                    <th>{{ $row->nama_produk}}</th>
                    <th>{{ $row->detail }}</th>
                    <th>{{ $row->harga }}</th>
                    <th>{{ $row->stok }}</th>
                    <th> 
                        <a href="editkatalog/{{$row->id}}">Edit</a>
                        <a href="hapuskatalog/{{$row->id}}">Delete</a>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
</section>
          <!-- /.box -->
@endsection

