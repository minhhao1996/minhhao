@extends('admin.layout')
@section('content')
    <form action="{{route('postEditMa',$data['id'])}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        @csrf
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-cd"></i> Cập nhật nhà cung cấp</h1>
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
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-body">
                        <div class="col-md-9">
                            <div class="box-body">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Tên nhà cung cấp <span class="maudo">(*)</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Tên nhà cung cấp" value="{{old('name',isset($data) ? $data['name']:null)}}">
                                        <div class="error" id="password_error" style="color: red"></div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Mã code <span class="maudo">(*)</span></label>
                                        <input type="text" class="form-control" name="code" placeholder="Mã code"  value="{{old('code',isset($data) ? $data['code']:null)}}">
                                        <div class="error" id="password_error" style="color: red"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Từ khóa <span class="maudo">(*)</span></label>
                                        <input type="text" class="form-control" name="keyword" placeholder="Từ khóa" value="{{old('keyword',isset($data) ? $data['keyword']:null)}}">
                                        <span style="font-style: italic; line-height: 32px;">Chú ý: Mỗi từ khóa phân cách bởi một dấu ",". Ví dụ: dienthoai, maytinhbang</span>
                                        <div class="error" id="password_error" style="color: red"></div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('keyword') }}</strong>
                                      </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control">
                                                @if($data['status']==0)
                                                <option value="1" selected>Xuất bản</option>
                                                <option value="0" selected="">Chưa xuất bản</option>
                                                @else
                                                <option value="0" >Chưa xuất bản</option>
                                                <option value="1" selected>Xuất bản</option>
                                                @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    </form>
@endsection