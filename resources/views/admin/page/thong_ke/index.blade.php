@extends('admin.share.master');
@section('noi_dung')
    <div class="card" id="app">
        <div class="card-header">
            <h3>Top sản phẩm xem nhiều nhất</h3>
        </div>
        <div class="card-body">

            {{-- <div class="row">
            <div class="col-5">
                <input id="begin" type="date" class="form-control" v-model="begin">
            </div>
            <div class="col-5">
                <input id="end" type="date" class="form-control" v-model="end">
            </div>
            <div class="col-2">
                <button id="thong_ke" class="btn w-100 btn-primary">Thống Kê</button>
            </div>
        </div> --}}
            <div class="card-footer mt-4">
                <canvas id="myChart"></canvas>
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
            created() {
                this.topViewProd();
            },
            methods: {
                topViewProd() {
                    axios
                        .post('{{ Route('TopViewThongKe') }}')
                        .then((res) => {
                            char_1.data.labels = res.data.labels;
                            char_1.data.datasets[0].data = res.data.data;
                            char_1.update();
                        });
                }
            },
        });
        const ctx = document.getElementById('myChart');
        var char_1 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{

                    label: '# of Votes',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
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

        // $("#thong_ke").click(function() {
        //     var payload = {
        //         "begin" : $("#begin").val(),
        //         "end"   : $("#end").val(),
        //     };

        //     axios
        //
        //         .then((res) => {
        //             char_1.data.labels = res.data.labels;
        //             char_1.data.datasets[0].data = res.data.data;
        //             char_1.update();
        //         })
        //         .catch((res) => {
        //             $.each(res.response.data.errors, function(k, v) {
        //                 toastr.error(v[0]);
        //             });
        //         });
        // });
    </script>
@endsection
