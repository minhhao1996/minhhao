@extends('admin.layout')
@section('content')
    <form action="{{route('postEditUs',$data['id'])}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        @csrf
    <section class="content-header">
        <h1><i class="fa fa-user-plus"></i> Cập nhật khách hàng</h1>
        <div class="breadcrumb">
            <button name="THEM_NEW" type="submit" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-floppy-save"></span> Lưu [Thêm]
            </button>
            <a class="btn btn-primary btn-sm" href="{{url('admin')}}" role="button">
                <span class="glyphicon glyphicon-remove"></span> Thoát
            </a>
        </div>
    </section>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <!--ND-->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Họ và tên <span class="maudo">(*)</span></label>
                                <input type="text" name="fullname" class="form-control" disabled value="{{old('name',isset($data) ? $data['name']:null)}}">
                            </div>
                            <div class="form-group">
                                <label>Điện thoại <span class="maudo">(*)</span></label>
                                <input type="text" name="phone" class="form-control" disabled value="{{old('name',isset($data) ? $data['phone']:null)}}">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="maudo">(*)</span></label>
                                <input type="email" name="email" class="form-control" disabled  value="{{old('name',isset($data) ? $data['email']:null)}}">
                            </div>
                            <div class="form-group">
                                <label>Quyền Hạn</label>
                                <select name="level" class="form-control" style="max-width:50%">
                                    @if( $data['level']==0)
                                    <option value="0" selected="">MEMBER</option>
                                        <option value="1" >QTV</option>
                                        <option value="2" >ADMIN</option>
                                    @elseif($data['level']==1)
                                        <option value="0" >MEMBER</option>
                                        <option value="1" selected="" >QTV</option>
                                        <option value="2" >ADMIN</option>
                                    @else
                                        <option value="0" >MEMBER</option>
                                        <option value="1" >QTV</option>
                                        <option value="2" selected="" >ADMIN</option>
                                        @endif
                                </select>
                            </div>
                        </div>

                        <!--/.ND-->
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    </form>
@endsection