@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH CẤU HÌNH</h6>
        </div>
    </div>
    <hr />
    <div class="row" id="app">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="">Tên cấu hình</label>
                            <input type="text" class="form-control" v-model="cau_hinh.ten_cau_hinh">
                        </div>
                        <div class="mb-3">
                            <label for="">Trạng thái</label>
                            <select name="" id="" class="form-control" v-model="cau_hinh.trang_thai">
                                <option value="1">Hiển thị</option>
                                <option value="0">Khóa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="button" class="btn btn-primary" v-on:click="taoCauHinh()">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Danh sách Tên cấu hình</h6>

                </div>

                <div class="card-body">
                    <table class="table table-responsive table-bordered text-center align-middle">
                        <thead>
                            <th>#</th>
                            <th>Tên Tên cấu hình</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </thead>
                        <tbody v-for="(v, k) in List_Opt">
                            <td>@{{ k }}</td>
                            <td>@{{ v.ten_cau_hinh }}</td>
                            <td>
                                <button class="badge bg-gradient-quepal text-white shadow-sm w-100" v-if="v.trang_thai == 1"
                                    v-on:click="doiStatus(v)">Hiển thị</button>
                                <button class="badge bg-gradient-bloody text-white shadow-sm w-100" v-else
                                    v-on:click="doiStatus(v)">Ẩn</button>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                        data-bs-target="#EditModal" v-on:click="cau_hinh_edit = Object.assign({}, v);"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-dark"
                                        v-on:click="cau_hinh_del = Object.assign({}, v)" data-bs-toggle="modal"
                                        data-bs-target="#DelBackdrop"><i class="bx bx-trash-alt me-0"></i></i>
                                    </button>
                                </div>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- description modal -->
        <!--Edit Modal -->
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tên cấu hình</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Tên Tên cấu hình</label>
                            <input type="text" class="form-control" v-model="cau_hinh_edit.ten_cau_hinh">
                        </div>
                        <div class="mb-3">
                            <label for="">Tình trạng</label>
                            <select name="" id="" class="form-control" v-model="cau_hinh_edit.trang_thai">
                                <option value="1">Hiển thị</option>
                                <option value="0">Khóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="CauHinhUpdate()">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="DelBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cảnh báo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Warning:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                Bạn có chắc muốn xóa <b>@{{ cau_hinh_del.ten_cau_hinh }}</b> này không ?
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="CauHinhDel()">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                cau_hinh_del: {},
                cau_hinh_edit: {},
                cau_hinh: {},
                List_Opt: [],

            },
            created() {
                this.cau_hinh.trang_thai = 1;
                this.loadData();
            },
            methods: {
                taoCauHinh() {
                    if(!this.cau_hinh.ten_cau_hinh)
                    {
                        toastr.error("Vui lòng điền đầy đủ thông tin !!", 'Cảnh báo');
                        return;
                    }
                    axios
                        .post("{{ Route('CauHinhCreate') }}", this.cau_hinh)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                this.loadData();
                            } else {
                                toastr.error(res.data.message);
                            }

                        });
                },

                doiStatus(payload) {
                    axios
                        .post('{{ Route('CauHinhStatus') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                this.loadData();
                            } else
                                toastr.error(res.data.message);
                        });
                },
                CauHinhUpdate() {
                    if(!this.cau_hinh_edit.ten_cau_hinh)
                    {
                        toastr.error("Vui lòng điền đầy đủ thông tin !!", 'Cảnh báo');
                        return;
                    }
                    axios
                        .post('{{ Route('CauHinhUpdate') }}', this.cau_hinh_edit)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#EditModal').modal('hide');
                                this.loadData();
                            } else
                                toastr.error(res.data.message);
                        });
                },

                CauHinhDel() {
                    axios
                        .post('{{ Route('CauHinhDestroy') }}', this.cau_hinh_del)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#DelBackdrop').modal('hide');
                                this.loadData();
                            } else
                                toastr.error(res.data.message);
                        });
                },

                loadData() {
                    axios
                        .post('{{ Route('CauHinhData') }}')
                        .then((res) => {
                            this.List_Opt = res.data.data;
                        });
                }
            },
        });
    </script>
@endsection
