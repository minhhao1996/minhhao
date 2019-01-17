@extends('admin.layout')
@section('content')
    <section class="content-header">
        <h1><i class="fa fa-gift"></i> Danh sách nhà cung cấp</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="{{url('admin/maker/add')}}" role="button">
                <span class="glyphicon glyphicon-plus"></span> Thêm mới
            </a>
            <a class="btn btn-primary btn-sm" href="" role="button">
                <span class="glyphicon glyphicon-trash"></span> Thùng rác(3)
            </a>
        </div>
    </section>
    <section class="content">
        @if (session('status'))
            <div class=" alert alert-{{session('color')}} " id="thongbao">
                <strong>{{session('status')}}</strong>  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <!-- Search Limit -->
                        <section class="content-search">
                            <div class="form-inline">
                                <form action="{{route('maker')}}" method="GET" accept-charset="utf-8">
                                    @csrf
                                    <div class=" input_sr">
                                        <div class="n0kmu"><input type="text" name="search" class="_1dC4W"
                                                                  placeholder="  Enter name Maker ">
                                            <button class="_1hZPO" type="submit" style="position: absolute"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                        <!-- ./Search Limit
                        <div class="box-tools pull-right">
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
                                        <th class="text	-center" style="width:10px;"><input name="checkAll" id="checkAll" type="checkbox"></th>
                                        <th class="text-center" style="width:20px">ID</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Keyword</th>
                                        <th class="text-center" style="width:90px">Trạng thái</th>
                                        <th class="text-center" style="width:50px">Sửa</th>
                                        <th class="text-center" style="width:50px">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($maker as $item)
                                    <tr>
                                        <td class="text-center" style="width:20px"><input name="checkboxid[]" type="checkbox" value="$id"></td>
                                        <td class="text-center">{{$item['id']}}</td>
                                        <td>{{$item['code']}}</td>
                                        <td><a href="http://[::1]/TTTN-Green/admin/producer/update/19">{{$item['name']}}</a></td>
                                        <td>{{$item['keyword']}}</td>
                                        <td class="text-center">
                                            <a href="http://[::1]/TTTN-Green/admin/producer/status/19">
                                                <span class="glyphicon glyphicon-remove-circle maudo"></span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-xs" href="{{route('EditMa',$item['id'])}}" role="button">
                                                <span class="glyphicon glyphicon-edit"></span>Sửa
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-xs" onclick="return xoa('Do you want Delete Maker ??')" href="{{route('deleteMa',$item['id'])}}" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>Xóa
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                            <div class="row">
                                @if($maker->lastPage()>1)
                                <div class="col-md-12 text-center">
                                    <ul class="pagination">
                                        <li class="hidden-xs"><a href="{{$maker->url(1)}}"><<<</a></li>
                                        @if($maker->currentPage()!=1)
                                            <li><a href="{{$maker->url($maker->currentPage()-1)}}">Prev</a></li>
                                        @endif
                                        @for($i=1; $i<=$maker->lastPage();$i++)
                                            <li class="{{($maker->currentPage()==$i)? 'active':''}}"><a href="{{$maker->url($i)}}">{{$i}}</a></li>

                                        @endfor
                                        @if($maker->currentPage()!=$maker->lastPage())
                                            <li><a href="{{$maker->url($maker->currentPage()+1)}}">Next</a></li>
                                        @endif
                                        <li class="hidden-xs"><a href="{{$maker->url($maker->lastPage())}}">>>> </a></li>
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