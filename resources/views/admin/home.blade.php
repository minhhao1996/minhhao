@extends('admin.layout')

@section('content')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>37</h3>
                        <p>Sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="ion-ios-calendar-outline"></i>
                    </div>
                    <a href="http://[::1]/TTTN-Green/admin/product" class="small-box-footer">Danh sách sản phẩm</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="http://[::1]/TTTN-Green/admin/content" class="small-box-footer">Danh sách bài viết</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>19</h3>

                        <p>Liên hệ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="http://[::1]/TTTN-Green/admin/customer" class="small-box-footer">Liên hệ khách hàng</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="http://[::1]/TTTN-Green/admin/orders" class="small-box-footer">Danh sách đơn hàng</a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>

    <section class="content">
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bán hàng &amp; Doanh thu</h3>
                        <!-- <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div> -->
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <div id="chart_div" style="width: 100%; height: 250px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 1021px; height: 250px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="1021" height="250" aria-label="A chart." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_0"><rect x="117" y="48" width="788" height="155"></rect></clipPath></defs><rect x="0" y="0" width="1021" height="250" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><text text-anchor="start" x="117" y="28.9" font-family="Arial" font-size="14" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">Số lượng bán ra từ 01/2017 - 12/2017</text><rect x="117" y="17" width="788" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="919" y="48" width="88" height="55" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="919" y="48" width="88" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="952" y="59.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">Bán ra</text></g><rect x="919" y="48" width="28" height="14" stroke="none" stroke-width="0" fill="#3366cc"></rect></g><g><rect x="919" y="71" width="88" height="32" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="952" y="82.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">Đơn</text><text text-anchor="start" x="952" y="100.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">hàng</text></g><rect x="919" y="71" width="28" height="14" stroke="none" stroke-width="0" fill="#dc3912"></rect></g></g><g><rect x="117" y="48" width="788" height="155" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://[::1]/TTTN-Green/admin#_ABSTRACT_RENDERER_ID_0)"><g><rect x="117" y="202" width="788" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="117" y="164" width="788" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="117" y="125" width="788" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="117" y="87" width="788" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="117" y="48" width="788" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="130" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="196" y="125" width="19" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="261" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="327" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="392" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="458" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="524" y="125" width="19" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="589" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="655" y="125" width="19" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="720" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="786" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="851" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="151" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="216" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="282" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="348" y="125" width="19" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="413" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="479" y="125" width="19" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="544" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="610" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="675" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="741" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="807" y="125" width="19" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect><rect x="872" y="125" width="20" height="0.5" stroke="none" stroke-width="0" fill="#dc3912"></rect></g><g><rect x="117" y="125" width="788" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="150.29166666666666" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">01/2018</text></g><g><text text-anchor="middle" x="215.875" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">02/2018</text></g><g><text text-anchor="middle" x="281.4583333333333" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">03/2018</text></g><g><text text-anchor="middle" x="347.04166666666663" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">04/2018</text></g><g><text text-anchor="middle" x="412.625" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">05/2018</text></g><g><text text-anchor="middle" x="478.2083333333333" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">06/2018</text></g><g><text text-anchor="middle" x="543.7916666666666" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">07/2018</text></g><g><text text-anchor="middle" x="609.375" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">08/2018</text></g><g><text text-anchor="middle" x="674.9583333333333" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">09/2018</text></g><g><text text-anchor="middle" x="740.5416666666666" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">10/2018</text></g><g><text text-anchor="middle" x="806.125" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">11/2018</text></g><g><text text-anchor="middle" x="871.7083333333333" y="223.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">12/2018</text></g><g><text text-anchor="end" x="103" y="207.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">-1.0</text></g><g><text text-anchor="end" x="103" y="168.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">-0.5</text></g><g><text text-anchor="end" x="103" y="130.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">0.0</text></g><g><text text-anchor="end" x="103" y="91.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">0.5</text></g><g><text text-anchor="end" x="103" y="53.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">1.0</text></g></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Month</th><th>Bán ra</th><th>Đơn hàng</th></tr></thead><tbody><tr><td>01/2018</td><td>0</td><td>0</td></tr><tr><td>02/2018</td><td>0</td><td>0</td></tr><tr><td>03/2018</td><td>0</td><td>0</td></tr><tr><td>04/2018</td><td>0</td><td>0</td></tr><tr><td>05/2018</td><td>0</td><td>0</td></tr><tr><td>06/2018</td><td>0</td><td>0</td></tr><tr><td>07/2018</td><td>0</td><td>0</td></tr><tr><td>08/2018</td><td>0</td><td>0</td></tr><tr><td>09/2018</td><td>0</td><td>0</td></tr><tr><td>10/2018</td><td>0</td><td>0</td></tr><tr><td>11/2018</td><td>0</td><td>0</td></tr><tr><td>12/2018</td><td>0</td><td>0</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 260px; left: 1031px; white-space: nowrap; font-family: Arial; font-size: 14px;">hàng</div><div></div></div></div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header" style="color: #e90000;">0 VNĐ</h5>
                                    <span class="description-text">Tổng doanh thu</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 col-xs-6">
                                <!-- <div class="description-block border-right">
                                  <h5 class="description-header" style="color: #e90000;">0 VNĐ</h5>
                                  <span class="description-text">Tổng chi phí</span>
                                </div> -->
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 col-xs-6">
                                <!-- <div class="description-block border-right">
                                  <h5 class="description-header" style="color: #e90000;">0 VNĐ</h5>
                                  <span class="description-text">Lợi nhuận</span>
                                </div> -->
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div></section>
@endsection
