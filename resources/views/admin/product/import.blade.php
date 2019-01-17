@extends('admin.layout')
@section('content')
    <form action="{{route('postImport',$pro['id'])}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        @csrf
<section class="content-header">
    <h1><i class="glyphicon glyphicon-text-background"></i> Nhập hàng</h1>
    <div class="breadcrumb">
        <button type="submit" class="btn btn-primary btn-sm">
            <span class="glyphicon glyphicon-floppy-save"></span>
            Lưu[Cập nhật]
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
                        <div class="form-group">
                            <div class="form-group">
                                <label>Tên sản phẩm </label>
                                <input type="text" class="form-control"  name="name" style="width:100%" placeholder="Tên sản phẩm" value="{{old('name',isset($pro) ? $pro['name']:null)}}">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select name="catid" class="form-control" style="width:300px" disabled="">
                                    @foreach ($catalogs as $row)
                                        @if(count($row->subs) > 1)
                                            <optgroup label="<?php echo $row->name?>">
                                                @foreach ($row->subs as $sub)
                                                    <option value="<?php echo $sub->id?>" <?php if($sub->id == $pro['cat_id']) echo 'selected';?>> <?php echo $sub->name?> </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option value="<?php echo $row->id?>" <?php if($row->id == $pro['cat_id']) echo 'selected';?>><?php echo $row->name?></option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Số lượng <span class="maudo">(*)</span></label>
                                    <input type="number" class="form-control" name="total" multiple="" required="" style="width:100%" placeholder="Số lượng" min="0" max="10000">
                                    <div class="error" id="password_error"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div></div>
</section>
    </form>
@endsection