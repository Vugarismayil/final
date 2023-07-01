@extends('admin.layouts.master')
@section('page_icon', 'fa fa-dashboard')
@section('page_name', 'Anasayfa')
@section('body')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Üyeler</h4>
                    <p><b>{{ $users }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-product-hunt fa-3x"></i>
                <div class="info">
                    <h4>Paketler</h4>
                    <p><b>{{ $packages }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
                <div class="info">
                    <h4>Siparişler</h4>
                    <p><b>{{ $orders }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-exchange fa-3x"></i>
                <div class="info">
                    <h4>Satışlar</h4>
                    <p><b>{{ $trans }}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Aylık Siparişler</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var d = {!! json_encode($month) !!};
        var m =  {!! json_encode($monthly_order) !!};
        var data = {
            labels: d,
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(47, 79, 79,0.2)",
                    strokeColor: "rgba(47, 79, 79,1)",
                    pointColor: "rgba(47, 79, 79,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: m
                }
            ]
        };


        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

    </script>
    @endsection