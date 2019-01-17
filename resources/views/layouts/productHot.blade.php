<div id="left_column">
    <div class="block left-module">
        <p class="title_block">Sản phẩm Hot</p>
        <div class="block_content">
            <ul class="products-block best-sell">
                @foreach($pro_hot as $hot)
                    @if($hot['status']!=0)
                    <li class="clearfix">
                        <div class="products-block-left">
                            <a href=""><img class="img-responsive" alt="{{$hot['name']}}}"
                                            src="{{asset('upload/product/avatar/')}}/{{$hot['avatar']}}"></a>
                        </div>
                        <div class="products-block-right">
                            <p class="product-name">
                                <a href="">{{$hot['name']}}}</a>
                            </p>
                            @if(!empty($hot['discount']))
                                <p class="product-price">
                                                        <span class="">
                                                        <?php $pricenew= $hot['price']-$hot['price']*$hot['discount']/100;
                                                            echo number_format($pricenew) ;
                                                            ?>₫
                                                        </span>
                                    <span class="price old-price">{{number_format($hot['price'])}}₫</span>
                                </p>
                            @else
                                <p class="product-price">
                                    <span class="">{{number_format($hot['price'])}}₫</span>
                                </p>
                            @endif
                        </div>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>