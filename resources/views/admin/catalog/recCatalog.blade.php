@extends('admin.layout')
@section('content')
<section class="content-header">
    <h1><i class="glyphicon glyphicon-cd"></i> Thùng rác danh mục sản phẩm</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="admin/category" role="button">
            <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
        </a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" id="view">
                <div class="box-header with-border">
                    <!-- Search Limit -->
                    <section class="content-search">
                        <div class="form-inline">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Tìm kiếm</span>
                                <input type="text" name="search" onkeypress="FEnter(event);" id="search" class="form-control">
                                <span class="input-group-addon"><i onclick="FChange();" class="glyphicon glyphicon-search"></i></span>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Hiển thị</span>
                                <select name="limit" id="limit" onchange="FChange();" class="form-control">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="all">Tất cả</option>
                                </select>
                            </div>
                        </div>
                    </section>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" style="padding:0px; margin:0px;">
                        <!--ND-->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width:20px">ID</th>
                                    <th>Tên loại sản phẩm</th>
                                    <th>Liên kết</th>
                                    <th>Ngày đăng</th>
                                    <th>Người đăng</th>
                                    <th class="text-center" style="width:90px">Khôi phục</th>
                                    <th class="text-center" style="width:90px">Xóa VV</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">53</td>
                                    <td>
                                        <a href="http://[::1]/TTTN-Green/admin/category/update/53">Asus (LT)</a>
                                    </td>
                                    <td>asus-lt</td>
                                    <td>2017-03-20 20:28:59</td>
                                    <td>Supper Admin</td>
                                    <td class="text-center">
                                        <a class="btn btn-success btn-xs" href="admin/category/restore/53" role="button">
                                            <span class="glyphicon glyphicon-edit"></span> Khôi phục
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a class="btn btn-danger btn-xs" href="admin/category/delete/53" role="button">
                                            <span class="glyphicon glyphicon-trash"></span>Xóa VV
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="pagination">
                                </ul>
                            </div>
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