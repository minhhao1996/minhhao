@extends('admin.layout')
@section('content')
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-user"></i> Danh sách khách hàng</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="admin/customer/recyclebin" role="button">
                <span class="glyphicon glyphicon-trash"></span> Thùng rác (0)
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
                                <form action="{{route('user')}}" method="GET" accept-charset="utf-8">
                                    @csrf
                                    <div class=" input_sr">
                                        <div class="n0kmu"><input type="text" name="search" class="_1dC4W"
                                                                  placeholder="  Enter name category ">
                                            <button class="_1hZPO" type="submit" style="position: absolute"><i
                                                        class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{route('user')}}" method="GET" accept-charset="utf-8">
                                    @csrf
                                    <div class="input_ca">
                                        <div style="float: right ;width: 50%;position: absolute">
                                            <select name="level" class="cat-control">
                                                <option value="">[--Chon Lervel cần tìm--]</option>
                                                <option value="2">[--ADMIN--]</option>
                                                <option value="1">[--QTV--]</option>
                                                <option value="0">[--MEMBER--]</option>
                                            </select>
                                            <button class="cat_button" type="submit"><i class="fa fa-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </section>
                        <!--./Search Limit -->
                        <!-- <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row" style="padding:0px; margin:0px;">
                            <!--ND-->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width:10px;"><input name="checkAll" id="checkAll" type="checkbox"></th>
                                        <th class="text-center" style="width:20px">ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Điện thoại</th>
                                        <th>Level</th>
                                        <th class="text-center" style="width:90px">Trạng thái</th>
                                        <th class="text-center" style="width:90px">Sửa quyền</th>
                                        <th class="text-center" style="width:50px">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $us)
                                        <td class="text-center" style="width:20px"><input name="checkboxid[]" type="checkbox" value="$id"></td>
                                        <td class="text-center"> {{$us['id']}}</td>
                                        <td>
                                                 {{$us['name']}}
                                        </td>
                                        <td>   {{$us['email']}}</td>
                                        <td>   {{$us['phone']}}</td>
                                        <td>
                                            @if($us['level']==0)
                                                MEMBER
                                                @elseif($us['level']==1)
                                                QTV
                                            @elseif($us['level']==2)
                                                ADMIN
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(!empty($us['email_verified_at']))
                                                    Verifi
                                                @else
                                                Dont
                                                @endif

                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-xs" href="{{route('EditUser',$us['id'])}}" role="button">
                                                <span class="glyphicon glyphicon-edit"></span>Sửa
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-xs" href="http://[::1]/TTTN-Green/admin/customer/trash/39" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>Xóa
                                            </a>
                                        </td>
                                    </tr>
                                   @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                @if($users->lastPage()>1)
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                            <li class="hidden-xs"><a href="{{$users->url(1)}}"><<<</a></li>
                                            @if($users->currentPage()!=1)
                                                <li><a href="{{$users->url($users->currentPage()-1)}}">Prev</a></li>
                                            @endif
                                            @for($i=1; $i<=$users->lastPage();$i++)
                                                <li class="{{($users->currentPage()==$i)? 'active':''}}"><a href="{{$users->url($i)}}">{{$i}}</a></li>

                                            @endfor
                                            @if($users->currentPage()!=$users->lastPage())
                                                <li><a href="{{$users->url($users->currentPage()+1)}}">Next</a></li>
                                            @endif
                                            <li class="hidden-xs"><a href="{{$users->url($users->lastPage())}}">>>> </a></li>
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