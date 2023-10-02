
@section('noi_dung')
@extends('client.share.master');
@include('client.share.slide')
@include('client.share.intro')
@include('client.share.menu')
<div class="wraper border border-light">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
            <h2>SẢN PHẨM MỚI</h2>
        </div>
    </div>
    <div class="row row-pb-md">
        @foreach ($bestSales as $k=>$v)
        <div class="col-lg-3 mb-4 text-center">
            <div class="product-entry border">
                <a class="prod-img" href="/home/product-detail/{{$v->id}}">
                    <img src="{{$v->hinh_anh}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                </a>
                <div class="desc">
                    <h2><a href="/home/product-detail/{{$v->id}}">{{$v->ten_san_pham}}</a></h2>
                    <span class="price"><b class="text-danger">{{ number_format($v->gia, 0, ',', '.') }} ₫</b></span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="w-100"></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p><a href="/home/all-product" style="text-decoration: underline;"><h5>XEM TẤT CẢ</h5></a></p>
        </div>
    </div>

</div>
<div class="wraper border border-light">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
            <h2>XEM NHIỀU NHẤT</h2>
        </div>
    </div>
    <div class="row row-pb-md">
        @foreach ($ht_vv_products as $k=>$v)
        <div class="col-lg-3 mb-4 text-center">
            <div class="product-entry border">
                <a class="prod-img" href="/home/product-detail/{{$v->id}}">
                    <img src="{{$v->hinh_anh}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                </a>
                <div class="desc">
                    <h2><a href="/home/product-detail/{{$v->id}}">{{$v->ten_san_pham}} </a></h2>
                    <span class="price"><b class="text-danger"><b class="text-danger">{{ number_format($v->gia, 0, ',', '.') }} ₫</b></b></span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="w-100"></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p><a href="/home/danh-muc/2" style="text-decoration: underline;"><h5>XEM TẤT CẢ</h5></a></p>
        </div>
    </div>

</div>

<div class="wraper border border-light">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
            <h2>HỌC TẬP - VĂN PHÒNG</h2>
        </div>
    </div>
    <div class="row row-pb-md">
        @foreach ($ht_vv_products as $k=>$v)
        <div class="col-lg-3 mb-4 text-center">
            <div class="product-entry border">
                <a class="prod-img" href="/home/product-detail/{{$v->id}}">
                    <img src="{{$v->hinh_anh}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                </a>
                <div class="desc">
                    <h2><a href="/home/product-detail/{{$v->id}}">{{$v->ten_san_pham}} </a></h2>
                    <span class="price"><b class="text-danger"><b class="text-danger">{{ number_format($v->gia, 0, ',', '.') }} ₫</b></b></span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="w-100"></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p><a href="/home/danh-muc/2" style="text-decoration: underline;"><h5>XEM TẤT CẢ</h5></a></p>
        </div>
    </div>

</div>
<div class="wraper border border-light">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
            <h2>ĐỒ HỌA - KĨ THUẬT</h2>
        </div>
    </div>
    <div class="row row-pb-md">
        @foreach ($dh_kt_products as $k=>$v)
        <div class="col-lg-3 mb-4 text-center">
            <div class="product-entry border">
                <a class="prod-img" href="/home/product-detail/{{$v->id}}">
                    <img src="{{$v->hinh_anh}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                </a>
                <div class="desc">
                    <h2><a href="/home/product-detail/{{$v->id}}">{{$v->ten_san_pham}}</a></h2>
                    <span class="price"><b class="text-danger">{{ number_format($v->gia, 0, ',', '.') }} ₫</b></span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="w-100"></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p><a href="/home/danh-muc/4" style="text-decoration: underline;"><h5>XEM TẤT CẢ</h5></a></p>
        </div>
    </div>

</div>
<div class="wraper border border-light">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
            <h2>GAMMING</h2>
        </div>
    </div>
    <div class="row row-pb-md">
        @foreach ($gamming_products as $k=>$v)
        <div class="col-lg-3 mb-4 text-center">
            <div class="product-entry border">
                <a class="prod-img" href="/home/product-detail/{{$v->id}}">
                    <img src="{{$v->hinh_anh}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                </a>
                <div class="desc">
                    <h2><a href="/home/product-detail/{{$v->id}}">{{$v->ten_san_pham}}</a></h2>
                    <span class="price"><b class="text-danger">{{ number_format($v->gia, 0, ',', '.') }} ₫</b></span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="w-100"></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p><a href="/home/danh-muc/1" style="text-decoration: underline;"><h5>XEM TẤT CẢ</h5></a></p>
        </div>
    </div>
</div>
@endsection

