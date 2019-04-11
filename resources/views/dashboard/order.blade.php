@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DETAIL ORDERAN</h3>
              <form action=""  class="sidebar-form">
                  <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                      </span>
                  </div>
              </form>
              <a href="{{url('tambahdataorder')}}"> Create </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" style="width: auto">
                <tr>
                  <th>ID Order</th>
                  <th>Nama Produk</th>
                  <th>Jumlah Order</th>
                  <th>harga</th>
                  <th>Total Harga</th>
                  <th>Tanggal Order</th>
                  <th>Opsi</th>
                </tr>
                
                @foreach ($dataorder as $row)
                <tr>
            
                    <th>{{ $row->idOrder }}</th>
                    <th>{{ $row->get_katalog->nama_produk}}</th>
                    <th>{{ $row->jumlah_order }}</th>
                    <th>{{ $row->harga }}</th>
                    <th>{{ $row->harga_total }}</th>
                    <th>{{ $row->tanggal }}</th>
                    <th> 
                        <a href="editorder/{{$row->idOrder}}">Edit</a>
                        <a href="hapusorder/{{$row->idOrder}}">Delete</a>
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

