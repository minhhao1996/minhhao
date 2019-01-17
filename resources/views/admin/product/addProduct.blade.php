@extends('admin.layout')
@section('content')
    <form action="{{route('postAdd')}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        @csrf
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-cd"></i> Thêm sản phẩm mới</h1>
        <div class="breadcrumb">
            <button type="submit" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-floppy-save"></span>
                Lưu[Thêm]
            </button>
            <a class="btn btn-primary btn-sm" href="admin/product" role="button">
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
                            <?php //echo validation_errors(); ?>
                            <div class="form-group">
                                <label>Tên sản phẩm <span class = "maudo">(*)</span></label>
                                <input type="text" class="form-control" name="name" style="width:100%" placeholder="Tên sản phẩm">
                                <div class="error" id="password_error"></div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm<span class = "maudo">(*)</span></label>
                                <select name="catid" class="form-control" style="width:300px">
                                    <option value = "">[--Chọn loại sản phẩm--]</option>
                                    @foreach ($catalogs as $row)
                                     @if(count($row->subs) > 0)
                                    <optgroup label="<?php echo $row->name?>">
                                       @foreach ($row->subs as $sub)
                                        <option value="<?php echo $sub->id?>"> <?php echo $sub->name?> </option>
                                        @endforeach
                                    </optgroup>
                                    @else
                                    <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
                                    @endif
                                    @endforeach

                                </select>
                                <div class="error" id="password_error"></div>
                                @if ($errors->has('catid'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('catid') }}</strong>
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nhà cung cấp <span class = "maudo">(*)</span></label>
                                <select name="maker" class="form-control" style="width:300px">
                                    <option value = "">[--Chọn nhà cung cấp--]</option>
                                    @foreach($maker as $row)
                                        <option value = "{{$row['id']}}">[--{{$row['name']}}--]</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('maker'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('maker') }}</strong>
                                      </span>
                                @endif
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề(*)</label>
                                <textarea name="title" class="form-control" ></textarea>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('title') }}</strong>
                                      </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Chi tiết sản phẩm(*)</label>
                                <textarea  name="contents" id="detail" class="form-control" ></textarea>
                                @if ($errors->has('contents'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('contents') }}</strong>
                                      </span>
                                @endif
                                <script>
                                    CKEDITOR.replace('contents');</script>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá bán(VND)(*)</label>
                                <input name="price_buy" class="form-control" type="number" value="0" min="0" step="1" max="1000000000">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi(%)</label>
                                <input name="sale" class="form-control"value="0" min="0" step="1" max="100" type="number">
                            </div>

                            <div class="form-group">
                                <label>Số lượng</label>
                                <input name="total" class="form-control" type="number" value="1" min="1" step="1" max="1000">
                            </div>
                            <div class="form-group">
                                <label>Quà tặng)</label>
                                <input name="gifts" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành(Tháng)</label>
                                <input name="warranty" class="form-control" type="number" value="0" min="0" step="1" max="100">
                            </div>
                            <div class="form-group">
                                <label>Hình đại diện</label>
                                <input type="file"  id="image_list" name="avatar" multiple="" required="" style="width: 100%">
                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh sản phẩm</label>
                                <input type="file" id="image_list" name="photos[]" multiple="" required="">
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