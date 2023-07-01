@extends('frontend.layouts.master')
@section('body')
    <style>
        pre{ overflow: hidden}
    </style>
    <section class="breadcrumb-area breadcrumb-bg white-bg" style="background-image: url({{ asset('assets/frontend/upload/logo/bread.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="title">API Dökümanı</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-page-area">
        <div class="container contact-page-container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @include('frontend.layouts.flash')
                    <div class="section-title">
                        <h2 class="title">API Dökümanlarımız</h2>
                        <p>{{ $general->api_des }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-page-inner">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>API URL</td>
                                        <td>{{url('/api/v1')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Response format</td>
                                        <td>JSON</td>
                                    </tr>
                                    <tr>
                                        <td>HTTP Method</td>
                                        <td>POST</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h5 class="m-t-md" style="padding-bottom: 5px"><strong>Service list</strong></h5>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="width-40">Parameters</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>key</td>
                                        <td>Your API key</td>
                                    </tr>
                                    <tr>
                                        <td>action</td>
                                        <td>"services"</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <p><strong>Example response</strong></p>
                                <pre>[
     {<em>
        "category": "Instagram"
        "max": "10000"
        "min": "50"
        "name": "Ä°nstagram Last Story Max 5k"
        "rate": "0.90"
        "service": 1
     </em>},
     {<em>
        "category": "Facebook"
        "max": "1500"
        "min": "10"
        "name": "Comments"
        "rate": "8"
        "service": 2
     </em>}
]</pre>
                                <br>
                                <h5 class="m-t-md" style="padding-bottom: 5px"><strong>Place new Order</strong></h5>
                                <div id="type_0" style="">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="width-40">Parameters</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>key</td>
                                            <td>Your API key</td>
                                        </tr>
                                        <tr>
                                            <td>action</td>
                                            <td>"add"</td>
                                        </tr>
                                        <tr>
                                            <td>service</td>
                                            <td>Service ID</td>
                                        </tr>
                                        <tr>
                                            <td>link</td>
                                            <td>Link to page</td>
                                        </tr>
                                        <tr>
                                            <td>quantity</td>
                                            <td>Quantity to be delivered</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><strong>Example response</strong></p>
                                <ul>
                                    <li><em>{"order" : "1242"}</em></li>
                                </ul>
                                <br>
                                <h5 class="m-t-md" style="padding-bottom: 5px"><strong>Order status</strong></h5>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="width-40">Parameters</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>key</td>
                                        <td>Your API key</td>
                                    </tr>
                                    <tr>
                                        <td>action</td>
                                        <td>status</td>
                                    </tr>
                                    <tr>
                                        <td>order</td>
                                        <td>Order ID</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <p><strong>Example response</strong></p>
                                <ul>
                                    <li><em>{"status" : "Pending", "start_count" : "1000", "remains" :
                                            "500"}</em></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
