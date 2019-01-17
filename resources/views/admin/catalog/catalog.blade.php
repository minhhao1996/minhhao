@extends('admin.layout')
@section('content')
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-cd"></i> Danh mục loại sản phẩm</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="{{ url('admin/catalog/add') }} " role="button">
                <span class="glyphicon glyphicon-plus"></span> Thêm mới
            </a>
            <a class="btn btn-primary btn-sm" href="{{ url('admin/catalog/recyclebin') }}" role="button">
                <span class="glyphicon glyphicon-trash"></span> Thùng rác (0)
            </a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            @if (session('status'))
                <div class=" alert alert-{{session('color')}} " id="thongbao">
                    <strong>{{session('status')}}</strong>  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            @endif

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <!-- Search Limit -->
                        <section class="content-search">
                            <div class="form-inline">
                                <form action="{{route('category')}}" method="GET" accept-charset="utf-8">
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
                                    <tr style="">

                                        <th class="text-center" style="width:20px">STT</th>
                                        <th class="text-center" style="width:50px">ID</th>
                                        <th style="text-align: center">Tên loại sản phẩm</th>
                                        <th style="text-align: center">Danh mục cha</th>
                                        <th style="text-align: center">Ngày tạo</th>
                                        <th class="text-center" style="width:100px">Trạng thái</th>
                                        <th class="text-center" style="width:70px">Sửa</th>
                                        <th class="text-center" style="width:70px">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt =0 ?>
                                    @foreach($cat as $row)
                                        <?php $stt++ ?>
                                    <tr style="text-align: center">
                                        <td class="text-center"> {{$stt}}</td>

                                        <td class="text-center"> {{$row["id"]}}</td>
                                        <td>
                                            {{$row["name"]}}
                                        </td>
                                        <td>

                                            @if($row["parent_id"]==0)
                                                {{"Parent"}}
                                            @else
                                                <?php
                                                $parent = DB::table('categorys')-> where('id',$row['parent_id'])->first();
                                                echo $parent->name;
                                                ?>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{$row["create_at"]}}	</td>
                                        <td class="text-center">

                                            <a href="http://[::1]/TTTN-Green/admin/category/status/53">
                                              {{'None'}}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-xs" href="{{route('postEditCat',$row['id'])}}" role="button">
                                                <span class="glyphicon glyphicon-edit"></span>Sửa
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-xs" onclick="return xoa('Do you want Delete Category ??')" href="{{route('deleteCat',$row['id'])}}" role="button">
                                                <span class="glyphicon glyphicon-trash"></span>Xóa
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                @if($cat->lastPage()>1)
                                <div class="col-md-12 text-center">
                                    <ul class="pagination">
                                        <li class="hidden-xs"><a href="{{$cat->url(1)}}"><<<</a></li>
                                        @if($cat->currentPage()!=1)
                                        <li><a href="{{$cat->url($cat->currentPage()-1)}}">Prev</a></li>
                                        @endif
                                        @for($i=1; $i<=$cat->lastPage();$i++)
                                        <li class="{{($cat->currentPage()==$i)? 'active':''}}"><a href="{{$cat->url($i)}}">{{$i}}</a></li>

                                        @endfor
                                        @if($cat->currentPage()!=$cat->lastPage())
                                            <li><a href="{{$cat->url($cat->currentPage()+1)}}">Next</a></li>
                                        @endif
                                        <li class="hidden-xs"><a href="{{$cat->url($cat->lastPage())}}">>>> </a></li>
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
<script>

</script>
@endsection