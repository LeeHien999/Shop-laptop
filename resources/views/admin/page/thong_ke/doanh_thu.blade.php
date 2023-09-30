@extends('admin.share.master')
@section('noi_dung')
    <div class="card" id="app">
        <div class="card-header">
            <div class="row mt-3">
                <div class="col-5">
                    <input id="begin" type="date" class="form-control" v-model="begin">
                </div>
                <div class="col-5">
                    <input id="end" type="date" class="form-control" v-model="end">
                </div>
                <div class="col-2">
                    <button id="thong_ke" class="btn w-100 btn-primary" v-on:click="thongKe()">Thống Kê</button>
                </div>
            </div>
            <div class="card-body mt-4">
                <canvas id="myChart"></canvas>
            </div>
            <div class="card-footer">
                <h4>Tổng doanh thu: <span class="text-danger">@{{ convertToVND(sum) }}</span></h4>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                begin: '',
                end: '',
                sum: 0,
            },
            created() {
                this.end = moment(new Date()).format('YYYY-MM-DD');
                this.begin = moment().subtract(7, 'days').format('YYYY-MM-DD');
            },
            methods: {
                thongKe() {
                    var payload = {
                        'begin': this.begin,
                        'end': this.end
                    };
                    axios
                        .post('{{ Route('DoanhThuThongKe') }}', payload)
                        .then((res) => {
                            char_1.data.labels = res.data.labels;
                            char_1.data.datasets[0].data = res.data.data;
                            char_1.update();

                            var datatong = res.data.data;
                            datatong.forEach(element => {
                                this.sum += element;
                            });
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                convertToVND(value) {
                    const formatter = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0,
                    });

                    return formatter.format(value);
                },
            },
        });
        const ctx = document.getElementById('myChart');
        var char_1 = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: '# Thống kê đơn hàng',
                    data: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
