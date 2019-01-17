@extends('admin.layout')
@section('content')
    <form action="{{route('postEditP',$data['id'])}}" name="frmEditPro" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
     @csrf
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-cd"></i> Cập nhật sản phẩm</h1>
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
                                <label>Tên sản phẩm <span class="maudo">(*)</span></label>
                                <input type="text" class="form-control" name="name" style="width:100%"
                                       placeholder="Tên sản phẩm" value="{{old('name',isset($data) ? $data['name']:null)}}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm<span class="maudo">(*)</span></label>
                                <select name="catid" class="form-control" style="width:300px">
                                    @foreach ($catalogs as $row)
                                        @if(count($row->subs) > 1)
                                            <optgroup label="<?php echo $row->name?>">
                                                @foreach ($row->subs as $sub)
                                                    <option value="<?php echo $sub->id?>" <?php if($sub->id == $data['cat_id']) echo 'selected';?>> <?php echo $sub->name?> </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option value="<?php echo $row->id?>" <?php if($row->id == $data['cat_id']) echo 'selected';?>><?php echo $row->name?></option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Nhà cung cấp<span class="maudo">(*)</span></label>
                                <select name="producer" class="form-control" style="width:300px">
                                    @foreach($maker as $row)
                                        <option value = "{{$row['id']}}"  <?php if($row['id'] == $data['maker_id']) echo 'selected';?>>[--{{$row['name']}}--]</option>
                                    @endforeach
                                </select>
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <textarea name="title" class="form-control"> {{old('title',isset($data) ? $data['title']:null)}}</textarea>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('title') }}</strong>
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Chi tiết sản phẩm(*)</label>
                                <textarea  name="contents" id="detail" class="form-control" >
                                    {{old('contents',isset($data) ? $data['contents']:null)}}
                                </textarea>
                                @if ($errors->has('contents'))
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $errors->first('contents') }}</strong>
                                      </span>
                                @endif
                                <script>CKEDITOR.replace('contents');</script>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input  type="number" class="form-control" name="price" style="width:100%"
                                        placeholder="Giá sản phẩm" value="{{old('price',isset($data) ? $data['price']:null)}}" min="0" step="10000"
                                        max="100000000">

                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi (%)</label>
                                <input  type="number" class="form-control" name="discount" style="width:100%"
                                        placeholder="Giảm giá" value="{{old('discount',isset($data) ? $data['discount']:null)}}" min="0" step="1"
                                        max="100">
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input  type="number" class="form-control" name="total" style="width:100%"
                                        placeholder="Tên quà tặng" value="{{old('total',isset($data) ? $data['total']:null)}}" min="0" step="1"
                                       max="1000">
                            </div>
                            <div class="form-group">
                                <label>Quà tặng </label>
                                <input type="text" class="form-control" name="gifts" style="width:100%"
                                       placeholder="Tên quà tặng" value="{{old('gifts',isset($data) ? $data['gifts']:null)}}">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Thời Gian Bảo Hành (tháng)</label>
                                <input type="number" class="form-control" name="gifts" style="width:100%"
                                       placeholder="Số tháng bảo hành" value="{{old('warranty',isset($data) ? $data['warranty']:null)}}">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Hình đại diện</label>
                                <input type="file" id="image_list" name="avatar" style="width: 100%" value="">
                                <img class="product-av" src="{{asset('upload/product/avatar/'.$data['avatar'])}}">

                            </div>
                            <div class="form-group ">
                                <label>Hình ảnh sản phẩm</label>
                                <input type="file" id="image_list" name="photos[]" multiple="" >
                                @foreach($product_img as $key=> $img)
                                    <div name="delete_pro">
                                        <div class="col-xs-6 col-sm-3 col-md-6 col-lg-6 product-one" id="{{$key}}"  >
                                            <div class="image-product">
                                                <img class="admin-pro" idImage="{{$img['id']}}"  src="{{asset('upload/product/detail/'.$img['file_name'])}}" id="{{$key}}" >
                                                <a href="javascript:void(0)" type="button" id="del_product">   <i class="fa fa-times-circle product-close"></i></a>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach
                            </div>

                        </div>
                    </div>
                </div><!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
        <!-- /.row -->
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection
