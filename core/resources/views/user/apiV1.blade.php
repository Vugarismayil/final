@extends('user.layouts.master')
@section('site_title', 'API Hizmeti')
@section('page_title')
    <i class="fa fa-globe"></i> API Dökümanları
@endsection
@section('body')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="table-rep-plugin table-responsive">
                        <table class="table" id="api-table">
                            <tbody>
                            <tr>
                                <th>API URL</th>
                                <td>{{url('/api/v1')}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Response format</th>
                                <td>JSON</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>HTTP Method</th>
                                <td>POST</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Your API key</th>
                                <td id="auth_key">{{ Auth::user()->api_key }}</td>
                                <td><a href="#" data-toggle="modal" data-target="#cautionKeyGenerate" style="outline: none">Yeni Anahtar Oluştur</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div id="accordion">
                        <div class="card custom-card">
                            <div class="card-header bg-dark click-accor" data-toggle="collapse"
                                 data-target="#collapseOne">
                                <h5 class="mb-0 pull-left text-white">Service List</h5>
                                <span class="pull-right"><i class="text-white fa fa-plus icon"></i></span>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <b>Required parameters</b>

                                            <div id="type_0">
                                                <ul>
                                                    <li><b width="20%">key</b> - Your API Key</li>
                                                    <li><b>action</b> - "services"</li>
                                                </ul>
                                            </div>
                                            <br>
                                            <b>Success response :</b>
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
                                            <b>Error response :</b>
                                            <ol>
                                                <li><em>{"error" : "Action should not be empty"}</em></li>
                                                <li><em>{"error" : "Api Key should not be empty"}</em></li>
                                                <li><em>{"error" : "Invalid Action"}</em></li>
                                                <li><em>{"error" : "Invalid API key"}</em></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div id="accordion">
                        <div class="card custom-card">
                            <div class="card-header bg-dark click-accor" data-toggle="collapse"
                                 data-target="#collapseTwo">
                                <h5 class="mb-0 pull-left text-white">Place new Order</h5>
                                <span class="pull-right"><i class="text-white fa fa-plus icon"></i></span>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <b>Required parameters</b>

                                            <div id="type_0">
                                                <ul>
                                                    <li><b width="20%">key</b> - Your API Key</li>
                                                    <li><b>action</b> - "add"</li>
                                                    <li><b>service</b> - Service ID</li>
                                                    <li><b>link</b> - Link to page</li>
                                                    <li><b>quantity</b> - Quantity to be delivered</li>
                                                </ul>
                                            </div>
                                            <br>
                                            <b>Success response :</b>
                                            <ol>
                                                <li><em>{"order" : "1242"}</em></li>
                                            </ol>
                                            <br>
                                            <b>Error response :</b>
                                            <ol>
                                                <li><em>{"error" : "Action should not be empty"}</em></li>
                                                <li><em>{"error" : "Api Key should not be empty"}</em></li>
                                                <li><em>{"error" : "Service Id should not be empty"}</em></li>
                                                <li><em>{"error" : "Requested link should not be empty"}</em></li>
                                                <li><em>{"error" : "Order quantity should not be empty"}</em></li>
                                                <li><em>{"error" : "Invalid Api key"}</em></li>
                                                <li><em>{"error" : "Invalid Service ID"}</em></li>
                                                <li><em>{"error" : "Insuffcient Funds"}</em></li>
                                                <li><em>{"error" : "Quantity should be within min quantity to max
                                                        quantity"}</em></li>
                                                <li><em>{"error" : "Invalid Action"}</em></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div id="accordion">
                        <div class="card custom-card">
                            <div class="card-header bg-dark click-accor" data-toggle="collapse"
                                 data-target="#collapseThree">
                                <h5 class="mb-0 pull-left text-white">Order Status</h5>
                                <span class="pull-right"><i class="text-white fa fa-plus icon"></i></span>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <b>Required parameters</b>

                                            <div id="type_0">
                                                <ul>
                                                    <li><b width="20%">key</b> - Your API Key</li>
                                                    <li><b>action</b> - "status"</li>
                                                    <li><b>order</b> - Order ID</li>
                                                </ul>
                                            </div>
                                            <br>
                                            <b>Success response :</b>
                                            <ol>
                                                <li><em>{"status" : "Pending", "start_count" : "1000", "remains" :
                                                        "500"}</em></li>
                                            </ol>
                                            <b>Available status</b>
                                            <ul>
                                                <li><span class="text-warning">Pending</span></li>
                                                <li><span class="text-secondary">Processing</span></li>
                                                <li><span class="text-info">In Progress</span></li>
                                                <li><span class="text-primary">Partial</span></li>
                                                <li><span class="text-success">Complete</span></li>
                                                <li><span class="text-danger">Order Cancelled</span></li>
                                                <li><span class="text-dark">Refunded</span></li>
                                            </ul>
                                            <br>
                                            <b>Error response :</b>
                                            <ol>
                                                <li><em>{"error" : "Action should not be empty"}</em></li>
                                                <li><em>{"error" : "Api Key should not be empty"}</em></li>
                                                <li><em>{"error" : "order Id should not be empty"}</em></li>
                                                <li><em>{"error" : "Invalid Api key"}</em></li>
                                                <li><em>{"error" : "Invalid order ID"}</em></li>
                                                <li><em>{"error" : "Invalid Action"}</em></li>
                                            </ol>
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
    <div class="modal fade" id="cautionKeyGenerate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i
                                class='fa fa-exclamation-triangle'></i><strong>Dikkat!</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <strong>Geçerli api anahtarınız iptal edilecek. Yeni api anahtarı oluşturduğunuzdan emin misiniz?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kapat
                    </button>
                    <button type="button" class="btn btn-primary custom-btn-background" id="key-generate"><i
                                class="fa fa-check"></i> Evet,Eminim.
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.click-accor', function () {
                if ($(this).find('.icon').hasClass('fa-plus')) {
                    $(this).find('.icon').removeClass('fa-plus').addClass('fa-minus');
                } else {
                    $(this).find('.icon').removeClass('fa-minus').addClass('fa-plus');
                }
            });
            $(document).on('click', '#key-generate', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: '{{route('key.generate')}}',
                    success: function (data) {
                        $('#auth_key').text(data);
                        $('#cautionKeyGenerate').modal('hide');
                    },
                });
            });
        });
    </script>
@endsection