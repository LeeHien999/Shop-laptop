@extends('client.share.master');
@section('noi_dung')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="/">Home</a></span> / <span>Search</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-product" id="app2">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>View All Products</h2>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-12">
                    <div class="toolbar-mode">
                        <div>
                            <div>
                                <label>
                                    <h5>Sắp xếp theo:</h5>
                                </label>
                                <select class="form" id="sortSelect" v-model="SortProd" v-on:change="SortProduct()">
                                    <option value="">Tùy chọn</option>
                                    <option value="PRICEASC">
                                        Sắp xếp theo giá: từ thấp
                                        đến cao
                                    </option>
                                    <option value="PRICEDESC">
                                        Sắp xếp theo giá: từ cao
                                        đến thấp
                                    </option>
                                    <option value="NAMEAZ">
                                        Sắp xếp theo alphabetically,
                                        A-Z
                                    </option>
                                    <option value="NAMEZA">
                                        Sắp xếp theo
                                        alphabetically: Z-A
                                    </option>
                                    <option value="DATENEW">
                                        Sắp xếp theo ngày: từ cũ
                                        đến mới
                                    </option>
                                    <option value="DATEOLD">
                                        Sắp xếp theo ngày: từ mới
                                        đến cũ
                                    </option>
                                    <option value="BESTSALE">
                                        Sắp xếp theo bán chạy nhất
                                    </option>
                                </select>
                                <i class="mwc-icon-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @if (isset($ttsearch))
                    @foreach ($ttsearch as $k => $v)
                        <div class="col-md-3 col-lg-3 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="/home/product-detail/{{ $v->id }}" class="prod-img">
                                    <img src="{{ $v->hinh_anh }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                                </a>
                                <div class="desc">
                                    <h2><a v-bind:href="'/home/product-detail/' + v.id">{{ $v->ten_san_pham }}</a></h2>
                                    <span class="price text-danger"><b>{{number_format($v->gia, 0, ',', '.')}} ₫</b></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col">
                            <h2>Không tìm thấy sản phẩm nào</h2>
                        </div>
                    </div>
                @endif

                <div class="w-100"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
