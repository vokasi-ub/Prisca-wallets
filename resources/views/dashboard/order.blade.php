@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DETAIL ORDERAN</h3>
              <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
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
                  <th>Jumlah Order</th>
                  <th>Total</th>
                  <th>Total Harga</th>
                  <th>Tanggal Order</th>
                  <th>Options</th>
                </tr>
                
                @foreach ($dataorder as $row)
                <tr>
            
                    <th>{{ $row->id }}</th>
                    <th>{{ $row->jumlah_order }}</th>
                    <th>{{ $row->total }}</th>
                    <th>{{ $row->total_harga }}</th>
                    <th>{{ $row->tanggal_waktu_order }}</th>
                    <th> 
                        <a href="editorder/{{$row->id}}">Edit</a>
                        <a href="hapusorder/{{$row->id}}">Delete</a>
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

