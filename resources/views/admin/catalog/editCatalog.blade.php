@extends('admin.layout')
@section('content')

        <form action="{{route('postEditCat',$data['id'])}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
            @csrf
            <section class="content-header">
                <h1><i class="glyphicon glyphicon-cd"></i> Cập nhật loại sản phẩm</h1>
                <div class="breadcrumb">
                    <button type = "submit" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-floppy-save"></span>
                        Lưu[Cập nhật]
                    </button>
                    <a class="btn btn-primary btn-sm" href="admin/category" role="button">
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
                                    <input type="text" class="form-control" name="name" style="width:50%" placeholder="Tên danh mục" value="{{old('name',isset($data) ? $data['name']:null)}}">
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
                                        <?php foreach ($list as $row):?>
                                        <option value="{{$row['id']}} " {{($row['id'] == $data['parent_id']) ? 'selected' : ''}}>[--{{$row['name']}}--]</option>
                                        <?php endforeach;?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Sắp xếp</label>
                                    <input name="orders" class="form-control" style="width:50%" value="{{old('orders',isset($data) ? $data['location']:null)}}">

                                </div>
                                <div class="form-group">
                                    <label>Từ khóa </label>
                                    <input type="text" class="form-control" name="keyword" style="width:50%" placeholder="Tên danh mục" value="{{old('keyword',isset($data) ? $data['keyword']:null)}}">

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