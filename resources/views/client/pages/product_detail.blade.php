@extends('client.share.master');
@section('noi_dung')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="index.html">Home</a></span> / <span>Product Details</span></p>
                </div>
            </div>
        </div>
    </div>

    <input type="number" id="id_san_pham" value="{{ $prod->id }}" hidden>
    <div class="colorlib-product" id="app3">
        <div class="container">
            <div class="row row-pb-lg product-detail-wrap">
                <div class="col-sm-8">
                    <div class="owl-carousel">
                        {{-- image main --}}
                        <div class="item">
                            <div class="product-entry border">
                                <a href="#" class="prod-img">
                                    <img src="{{ $prod->hinh_anh }}" class="img-fluid"
                                        alt="Free html5 bootstrap 4 template">
                                </a>

                            </div>
                        </div>

                        {{-- image options --}}
                        @foreach ($colors as $k => $v)
                            <div class="item">
                                <div class="product-entry border">
                                    <a href="#" class="prod-img">
                                        <img src="{{ $v->hinh_anh }}" class="img-fluid"
                                            alt="Free html5 bootstrap 4 template">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-desc">
                        <h3>{{ $prod->ten_san_pham }}</h3>
                        <p class="price">
                            <span v-if="size == -1">{{ number_format($prod->gia, 0, ',', '.') }} ₫</span>
                            <span v-else>@{{ formatNumber(variant_price) }} ₫</span>
                            <span class="rate" hidden>
                                <i class="icon-star-full"></i>
                                <i class="icon-star-full"></i>
                                <i class="icon-star-full"></i>
                                <i class="icon-star-full"></i>
                                <i class="icon-star-full"></i>
                            </span>
                            <span class="start">
                                <i v-for="(star, index) in 5" :key="index" class="icon-star"
                                    :class="{ 'icon-star-full': index < tbstart }"
                                    :class="{ 'icon-star-empty': index >= tbstart }"></i>
                            </span>
                            <span>
                                <p>(@{{ totalRatingCount }} Rating)</p>
                            </span>
                        </p>
                        <p></p>
                        <div class="size-wrap">
                            <div class="block-26 mb-2">
                                <h4>Size</h4>
                                <ul v-if="color != -1">
                                    <li v-for="(v, k) in list_options">
                                        <button
                                            v-on:click="size = v.cau_hinh_id, prod_choosed.id = v.id, variant_price = v.gia_dieu_chinh"
                                            v-bind:class="['btn', { 'btn-dark': size === v.cau_hinh_id }]">
                                            @{{ v.ten_cau_hinh }}
                                        </button>
                                    </li>
                                </ul>
                                <h4 v-if="color == -1">Vui lòng chọn màu sắc</h4>
                            </div>
                            <div class="block-26 mb-4">
                                <h4>Color</h4>
                                <ul>
                                    @foreach ($colors as $k => $v)
                                        <li>
                                            <button type="button"
                                                v-bind:class="['btn' ,{'btn-dark' : color==={{ $v->id }}}]"
                                                v-on:click="load_options({{ $prod->id }}, {{ $v->id }})">
                                                {{ $v->ten_mau_sac }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="input-group mb-4">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field=""
                                    onclick="giam()">
                                    <i class="icon-minus2"></i>
                                </button>
                            </span>
                            <input type="number" id="quantity" name="quantity" class="form-control input-number"
                                value="1" min="1" max="100">
                            <span class="input-group-btn ml-1">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field=""
                                    onclick="tang()">
                                    <i class="icon-plus2"></i>
                                </button>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                @if (!Session::get('auth'))
                                    <h5 class="text-danger">Vui lòng đăng nhập để mua hàng !!</h5>
                                @else
                                    <p class="addtocart"><a class="btn btn-primary btn-addtocart text-light"
                                            v-on:click="AddProduct()"><i class="icon-shopping-cart"></i> Add to Cart</a></p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12 pills">
                            <div class="bd-example bd-example-tabs">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                            href="#pills-description" role="tab" aria-controls="pills-description"
                                            aria-expanded="true">Description</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                            role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane border fade show active" id="pills-description" role="tabpanel"
                                        aria-labelledby="pills-description-tab">
                                        {!! $prod->mo_ta !!}
                                    </div>



                                    <div class="tab-pane border fade" id="pills-review" role="tabpanel"
                                        aria-labelledby="pills-review-tab">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="head">@{{ totalRatingCount }} Reviews</h3>
                                                <div class="review">
                                                    <div class="user-img"
                                                        style="background-image: url(images/person1.jpg)"></div>

                                                    <div class="desc">
                                                        @if (!Session::get('auth'))
                                                            <h4>
                                                                <span class="text-left">Vui lòng đăng nhập để bình
                                                                    luận.</span>

                                                            </h4>
                                                        @else
                                                            <textarea id="cmt-content" class="form-control" cols="30" rows="5"
                                                                placeholder="Hãy comment cảm nghĩ của bạn về sản phẩm..."></textarea>
                                                            <p class="star mt-3">
                                                                <span>
                                                                    <span class="rate fa-lg" data-rating="1">
                                                                        <i class="icon-star-empty"></i>
                                                                        <i class="icon-star-empty"></i>
                                                                        <i class="icon-star-empty"></i>
                                                                        <i class="icon-star-empty"></i>
                                                                        <i class="icon-star-empty"></i>
                                                                    </span>
                                                                </span>

                                                                <span class="text-right"><a v-on:click="comment()"
                                                                        class="btn btn-primary"><i
                                                                            class="fa-solid fa-comment text-light"></i></a></span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <template v-for="(v, k) in list_cmt">
                                                    <div class="review">
                                                        <div class="user-img"
                                                            :style="'background-image: url(https://static.thenounproject.com/png/5034901-200.png)'"></div>
                                                        <div class="desc">
                                                            <h4>
                                                                <span class="text-left">@{{ v.ho_va_ten }}</span>
                                                                <span class="text-right">@{{ formatDate(v.created_at) }}</span>
                                                            </h4>
                                                            <p class="star">
                                                                <span class="comment-rating">
                                                                    <i v-for="(star, index) in 5" :key="index"
                                                                        class="icon-star"
                                                                        :class="{ 'icon-star-full': index < v.ratting }"
                                                                        :class="{ 'icon-star-empty': index >= v.ratting }"></i>
                                                                </span>
                                                                <span class="text-right"><a href="#"
                                                                        class="reply"><i
                                                                            class="icon-reply"></i></a></span>
                                                            </p>
                                                            <p>
                                                                @{{ v.content }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div class="row">
                                                    <div class="col">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-center">
                                                                <li v-if="currentPage > 1" class="page-item">
                                                                    <a class="page-link" href="#"
                                                                        v-on:click="changePage(currentPage-1)"
                                                                        aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                </li>
                                                                <template v-for="k in lastPage">
                                                                    <li class="page-item"
                                                                        :class="{ 'active': currentPage === k }">
                                                                        <a class="page-link" href="#"
                                                                            v-on:click="changePage(k)">@{{ k }}</a>
                                                                    </li>
                                                                </template>
                                                                <li class="page-item" v-if="currentPage < lastPage">
                                                                    <a class="page-link" href="#"
                                                                        v-on:click="changePage(currentPage+1)"
                                                                        aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="rating-wrap">
                                                    <h3 class="head">Give a Review</h3>
                                                    <div class="wrap">
                                                        <template v-for="(v, k) in list_rating">
                                                            <p class="star">
                                                                <span class="comment-rating">
                                                                    <i v-for="(star, index) in 5" :key="index"
                                                                        class="icon-star"
                                                                        :class="{ 'icon-star-full': index < v.ratting }"
                                                                        :class="{ 'icon-star-empty': index >= v.ratting }"></i>
                                                                    (@{{ v.percent }}%)
                                                                </span>
                                                                <span>@{{ v.rating_count }} Reviews</span>
                                                            </p>
                                                        </template>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function() {

            $("#rateYo").rateYo({

                rating: 2,
                fullStar: true,
                multiColor: {

                    "startColor": "#FF0000", //RED
                    "endColor": "#00FF00" //GREEN
                }
            });

        });
        new Vue({
            el: '#app3',
            data: {
                list_options: [],
                list_cmt: [],
                list_rating: [],
                color: -1,
                size: -1,
                prod_choosed: {
                    'id': -1,
                    'so_luong': 0,
                },
                variant_price: -1,
                //cmt
                currentPage: 1,
                lastPage: 1,
                totalRatingCount: 0,
                tbstart: 0,
            },
            created() {
                this.tangviewProduct();
                this.loadcmt();
            },
            methods: {
                loadcmt(page = 1) {
                    var payload = {
                        'product_id': $('#id_san_pham').val(),
                    };

                    axios
                        .post('{{ Route('DataComment') }}', {
                            page: page,
                            payload,
                        })
                        .then((res) => {
                            this.list_cmt = res.data.data.data;
                            this.list_rating = res.data.ratings;
                            this.tbstart = res.data.tbstart;
                            this.totalRatingCount = res.data.totalRatingCount;
                            this.currentPage = res.data.data.current_page;
                            this.lastPage = res.data.data.last_page;
                        });

                },

                changePage(page) {
                    console.log(page);
                    this.loadcmt(page);
                },

                comment() {
                    var ratingContainer = document.querySelector('.rate');
                    var currentRating = parseFloat(ratingContainer.getAttribute('data-rating'));

                    var payload = {
                        'product_id': $('#id_san_pham').val(),
                        'ratting': currentRating - 5,
                        'content': $('#cmt-content').val(),
                    }

                    axios
                        .post('{{ Route('AddComment') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message, 'Success');
                                this.loadcmt();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });

                },
                load_options(prod_id, color_id) {
                    this.color = color_id;
                    var payload = {
                        'product_id': prod_id,
                        'mau_sac_id': color_id
                    };

                    axios
                        .post('{{ Route('OptData') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1)
                                this.list_options = res.data.data;
                            else
                                toastr.error(res.data.message, 'erro');
                        })

                },

                AddProduct() {
                    this.prod_choosed.so_luong = $('#quantity').val();
                    axios
                        .post('{{ Route('AddToCart') }}', this.prod_choosed)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                            } else {
                                toastr.error(res.data.message);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                    this.CountProduct();
                },

                CountProduct() {
                    axios
                        .post('{{ Route('CountCart') }}')
                        .then((res) => {
                            $('#countofprod').text(res.data.data);
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },

                formatNumber(price) {
                    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },

                tangviewProduct() {
                    var payload = {
                        'id': $('#id_san_pham').val(),
                    };
                    axios
                        .post('{{ Route('IncreaseProductV') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1)
                                console.log('ok');
                        });
                },

                formatDate(date) {
                    if (date) {
                        const dateObj = new Date(date);
                        const day = dateObj.getDate();
                        const month = dateObj.getMonth() + 1;
                        const year = dateObj.getFullYear();
                        const hours = dateObj.getHours();
                        const minutes = dateObj.getMinutes();

                        // Định dạng lại ngày tháng và thời gian
                        return `${hours}:${minutes} ${day}/${month}/${year}`;
                    }
                    return '';
                },

            },
        });

        function tang() {
            var val = document.getElementById("quantity");
            val.value = parseInt(val.value) + 1;
        }

        function giam() {
            var val = document.getElementById("quantity");
            val.value = parseInt(val.value) - 1;
        }

        //phần bình luận
        const stars = document.querySelectorAll('.rate i');
        const rating = document.querySelector('.rate');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const newRating = index + 1;
                rating.setAttribute('data-rating', newRating);

                stars.forEach((s, i) => {
                    if (i < newRating) {
                        s.classList.remove('icon-star-empty');
                        s.classList.add('icon-star-full');
                    } else {
                        s.classList.remove('icon-star-full');
                        s.classList.add('icon-star-empty');
                    }
                });
            });
        });
    </script>
@endsection
