@extends('user.layouts.master')
@section('site_title', 'Toplu Sipariş')
@section('page_title')
    <i class="fa fa-shopping-cart"></i> Toplu Siparişler
@endsection
@section('body')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('user.layouts.flash')
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Toplu Sipariş Verin </h3> &nbsp;<span> (Her yeni sipariş için Enter düğmesine basın , bir alt satıra geçin..)</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('massOrder.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" id="mass-order" rows="8" name="mass_order" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sipariş Ver" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var placeholder = "service_id|link|quantity \nservice_id|link|quantity \nservice_id|link|quantity";
            $('#mass-order').attr('placeholder', placeholder);
        });
    </script>
@endsection