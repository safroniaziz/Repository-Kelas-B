@extends('layouts')
@section('content')
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Manajemen User</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>

      <form action="{{ route('manajemen_user.post') }}" method="POST">
        @csrf @method('POST')
        <div class="box-body">
            <div class="form-group">
                <label>Masukan Nama </label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Masukan Email </label>
                <input type="text" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label>Masukan Password </label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <!-- /.box-footer-->
      </form>
      
    </div>
    <!-- /.box -->
@endsection