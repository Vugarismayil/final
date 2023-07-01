@extends('user.layouts.master')
@section('site_title', 'Bakiye')
@section('page_title')
    <i class="fa fa-shopping-basket"></i> Bakiye
@endsection
@section('body')
            <div class="row">
                @include('user.layouts.flash')
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($items as $gate)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>{{$gate->name}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{asset('assets/frontend/upload/gateway')}}/{{$gate->id}}.jpg"
                                             style="width:100%">
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-block" data-toggle="modal"
                                                data-target="#depositModal{{$gate->id}}"><strong>Bakiye Yükle</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--Buy Modal -->
                            <div id="depositModal{{$gate->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Bakiye Yükle - <strong>{{$gate->name}}</strong></h4>
                                            <button type="button" class="btn btn-danger pull-right"
                                                    data-dismiss="modal">Kapat
                                            </button>
                                        </div>

                                        <form method="post" action="{{ route('user.depositPreview') }}">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="hidden" name="gateway" value="{{$gate->id}}">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="number" name="amount" class="form-control form-control-lg"
                                                               id="amount"
                                                               placeholder="Bakiye Miktarı" required>
                                                        <div class="input-group-append">
                                                        <span class="input-group-text">{{ $general->currency_symbol }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-block">Yükle</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
@endsection