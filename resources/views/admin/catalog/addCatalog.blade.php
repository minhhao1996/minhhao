@extends('admin.layout')
@section('content')


        <form action="{{route('AddCat')}}" method="post" enctype="multipart/form-data" method="get" accept-charset="utf-8">
            @csrf
            <section class="content-header">
                <h1><i class="glyphicon glyphicon-cd"></i> Thêm danh mục mới</h1>
                <div class="breadcrumb">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-floppy-save"></span>
                        Lưu[Thêm]
                    </button>
                    <a class="btn btn-primary btn-sm" href="{{url('admin/catalog')}}" role="button">
                        <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                    </a>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box" id="view">

                                <div class="box-body">
                                <div class="form-group">
                                    <label>Tên danh mục <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="name" style="width:50%" placeholder="Tên danh mục">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>Danh mục cha</label>
                                    <select name="parentid" class="form-control" style="width:50%">
                                        <option value="0">[--Danh Muc Cha--]</option>
                                        @foreach($parent as $item)
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="form-group">
                                        <label>Vị trí danh mục </label>
                                        <input type="number" min="0" max="20" class="form-control" name="orders" style="width:50%" placeholder="Vị trí đặt danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label>Từ khóa </label>
                                        <input type="text" class="form-control" name="keyword" style="width:50%" placeholder="Tên các từ khóa">

                                    </div>
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="file"  id="image_list" name="icon" multiple=""  style="width: 100%">
                                    </div>
                            </div>
                        </div><!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <!-- /.row -->

                </div>
            </section>
        </form>
        <!-- /.content -->

@endsection