@extends('user.layouts.master')
@section('site_title', 'Destek Hattı')
@section('page_title')
    <i class="fa fa-ticket"></i> Destek Bileti
@endsection
@section('body')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @include('user.layouts.flash')
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Destek Bileti Aç</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('user.ticket.store') }}">
                        @csrf
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="form-control-label"><b>Konu</b></label>
                                <input type="text" class="form-control form-control-lg" name="subject" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label"><b>Mesajınız</b></label>
                                <textarea class="form-control" name="message" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary btn-block btn-lg" type="submit">
                                Gönder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection