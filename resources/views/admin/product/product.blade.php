@extends('admin.layout')
@section('content')

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-cd"></i> Danh sách sản phẩm</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="{{url('admin/product/add')}}" role="button">
                <span class="glyphicon glyphicon-plus"></span> Thêm mới
            </a>
            <a class="btn btn-primary btn-sm" href="{{url('admin/product')}}" role="button">
                <span class="glyphicon glyphicon-trash"></span> Thùng rác(0)
            </a>
        </div>
    </section>
    <section class="content">
        @if (session('status'))
            <div class=" alert alert-{{session('color')}} " id="thongbao">
                <strong>{{session('status')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <!-- Search Limit -->
                        <section class="content-search">
                            <div class="form-inline">
                                <div class="input-group" style="float: left; position: relative;width: 100%">
                                    <form action="{{route('index')}}" method="GET" accept-charset="utf-8">
                                        @csrf
                                        <div class=" input_sr">
                                            <div class="n0kmu"><input type="text" name="search" class="_1dC4W"
                                                                      placeholder="  Enter name product ">
                                                <button class="_1hZPO" type="submit" style="position: absolute"><i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="{{route('index')}}" method="GET" accept-charset="utf-8">
                                        @csrf
                                        <div class="input_ca">
                                            <div style="float: right ;width: 50%;position: absolute">
                                                <select name="category" class="cat-control">
                                                    <option value="">[--Chon danh mục cần tìm--]</option>
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
                                                <button class="cat_button" type="submit"><i class="fa fa-search"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row" style="padding:0px; margin:0px;">
                            <!--ND-->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" style="text-align: center">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th class="text	-center" style="width:10px;"><input name="checkAll"
                                                                                               id="checkAll"
                                                                                               type="checkbox"></th>
                                        <th class="text-center" style="width:20px">ID</th>
                                        <th>Hình</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Trạng Thái</th>
                                        <th class="text-center" style="width:90px">Số lượng</th>
                                        <th class="text-center" style="width:90px">Nhập hàng</th>
                                        <!-- <th class="text-center" style="width:90px">Bình luận</th> -->
                                        <th class="text-center" style="width:50px">Sửa</th>
                                        <th class="text-center" style="width:50px">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $pro)
                                        <tr>
                                            <td class="text-center" style="width:20px"><input name="checkboxid[]"
                                                                                              type="checkbox"
                                                                                              value="$id"></td>
                                            <td class="text-center">{{$pro['id']}}</td>
                                            <td style="width:50px">
                                                <img src="{{asset('upload/product/avatar')}}/{{$pro['avatar']}}"
                                                     alt="Điện thoại iPhone 7 Plus 256GB" class="img-responsive">
                                            </td>
                                            <td><a href="">{{$pro['name']}}</a></td>
                                            <td>
                                                <?php $catalogs = DB::table('categorys')->where('id', $pro['cat_id'])->first();?>
                                                {{$catalogs->name}}
                                            </td>
                                            <td class="text-center">

                                                @if(($pro['discount']) > 0)
                                                    <?php $price_new = ($pro['price']) - (($pro['price']) * ($pro['discount']) / 100);?>
                                                    <b style="color:red">{{number_format($price_new)}} đ</b>
                                                    <p style="text-decoration:line-through">{{number_format($pro['price'])}}
                                                        đ</p>
                                                @else
                                                    <b style="color:red">{{number_format($pro['price'])}} đ</b>
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                @if($pro['status']==0)
                                                    <a href="{{route('status',$pro['id'])}}">
                                                        <span class="glyphicon glyphicon-remove-circle maudo"></span>
                                                    </a>
                                                @else
                                                    <a href="{{route('status',$pro['id'])}}">
                                                        <span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($pro['total']==0)
                                                    <strong>Hết Hàng</strong>
                                                @else
                                                    {{$pro['total']}}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-success btn-xs" href="{{route('import',$pro['id'])}}"
                                                   role="button">
                                                    <span class="fa fa-cloud-upload"></span> Nhập hàng
                                                </a>
                                            </td>

                                            <td class="text-center">
                                                <a class="btn btn-success btn-xs" href="{{route('editP',$pro['id'])}}"
                                                   role="button">
                                                    <span class="glyphicon glyphicon-edit"></span> Sửa
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-xs"
                                                   onclick="return xoa('Do you want Delete Product ??')"
                                                   href="{{route('deleteP',$pro['id'])}}" role="button">
                                                    <span class="glyphicon glyphicon-trash"></span> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                                <div class="row">
                                    @if($product->lastPage()>1)
                                        <div class="col-md-12 text-center">
                                            <ul class="pagination">
                                                <li class="hidden-xs"><a href="{{$product->url(1)}}"><<<</a></li>
                                                @if($product->currentPage()!=1)
                                                    <li><a href="{{$product->url($product->currentPage()-1)}}">Prev</a></li>
                                                @endif
                                                @for($i=1; $i<=$product->lastPage();$i++)
                                                    <li class="{{($product->currentPage()==$i)? 'active':''}}"><a href="{{$product->url($i)}}">{{$i}}</a></li>

                                                @endfor
                                                @if($product->currentPage()!=$product->lastPage())
                                                    <li><a href="{{$product->url($product->currentPage()+1)}}">Next</a></li>
                                                @endif
                                                <li class="hidden-xs"><a href="{{$product->url($product->lastPage())}}">>>> </a></li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                            <!-- /.ND -->
                        </div>
                    </div><!-- ./box-body -->
                </div><!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection