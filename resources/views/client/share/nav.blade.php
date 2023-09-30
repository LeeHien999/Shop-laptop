<nav class="colorlib-nav" role="navigation" id="app">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-9">
                    <div id="colorlib-logo"><a href="/">SC STORE</a></div>
                </div>
                <div class="col-sm-5 col-md-3">
                    <div class="search-wrap">
                        <div class="form-group">
                            <input type="text" class="form-control search" placeholder="Search" id="ttsearch">
                            <button class="btn btn-primary submit-search text-center"id="btn_search"  type="button" ><i
                                    class="icon-search" ></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-left menu-1">
                    <ul>
                        <li class=""><a href="/">Home</a></li>
                        <li class="has-dropdown"><a href="#">Danh Mục</a>
                            <ul class="dropdown">
                                <template v-for="(v, k) in list_danhmuc">
                                    <li><a v-bind:href="'/home/danh-muc/'+v.id">@{{ v.ten_danh_muc }}</a></li>
                                </template>
                            </ul>
                        </li>
                        <li class="has-dropdown"><a href="#">Thương hiệu</a>
                            <ul class="dropdown">
                                <template v-for="(v, k) in list_thuonghieu">
                                    <li><a v-bind:href="'/home/thuong-hieu/'+v.id">@{{ v.ten_thuong_hieu}}</a></li>
                                </template>
                            </ul>
                        </li>

                        <li><a href="/home/about-us/">About</a></li>
                        <li><a href="/home/contact/">Contact</a></li>
                        <li class="has-dropdown"><a
                                href="#">{{ Session::get('auth') ? Session::get('auth')->ho_va_ten : 'User' }}</a>
                            <ul class="dropdown">
                                @if (Session::get('auth') == null)
                                    <li><a href="/home/login/">Login</a></li>
                                    <li><a href="/home/register/">Register</a></li>
                                @else
                                    <li><a href="#"></a></li>
                                    <li><a href="/home/order/">Quản lý đơn hàng</a></li>
                                    <li><a href="#" v-on:click="logout()">Logout</a></li>
                                @endif

                            </ul>
                        </li>
                        <li class="cart"><a href="/home/cart/"><i class="icon-shopping-cart"></i> Cart [<span
                                    id="countofprod"></span>]</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Our biggest sale yet 50% off all laptops</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    var currentUrl = window.location.pathname;
    var menuItems = document.querySelectorAll('.menu-1 ul li');
    menuItems.forEach(function(item) {
        var menuItemUrl = item.querySelector('a').getAttribute('href');
        if (currentUrl == menuItemUrl) {
            item.classList.add('active');
        }
    });

    new Vue({
        el: '#app',
        data: {
            count: 0,
            list_danhmuc: [],
            list_thuonghieu: []
        },
        created() {
            this.CountProduct();
            this.loaddanhmuc();
            this.loadthuonghieu();
        },
        methods: {
            logout() {
                axios
                    .post('{{ Route('clientLogout') }}')
                    .then((res) => {
                        if (res.data.status == 1) {
                            setTimeout(() => {
                                window.location.href = '/';
                            }, 500);

                        }
                    });
            },

            CountProduct() {
                axios
                    .post('{{ Route('CountCart') }}')
                    .then((res) => {
                        if(res.data.status == 1)
                        {
                            this.count = res.data.data;
                            $('#countofprod').text(this.count);
                        }
                        else
                        {
                            $('#countofprod').text(this.count);
                        }

                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            },
            loaddanhmuc() {
                axios
                    .post('{{ Route('loadDanhMucMenu') }}')
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.list_danhmuc = res.data.data;
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
            loadthuonghieu() {
                axios
                    .post('{{ Route('loadThuongHieuMenu') }}')
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.list_thuonghieu = res.data.data;
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

        },
    });

    $('#btn_search').click(function(){
        var ttsearch = $('#ttsearch').val();
        window.location.href = "/home/search/" + ttsearch;
    });
</script>
