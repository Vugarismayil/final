@extends('admin.layouts.master')
@section('page_icon', 'fa fa-envelope')
@section('page_name', 'Abonelere E-posta Gönder')
@section('addButton')
    <a class="btn btn-outline-danger btn-lg" href="{{ route('admin.subscibers') }}"><i
                class="fa fa-backward"></i> Geri</a>
@endsection
@section('body')
<div class="tile">
    @include('admin.layouts.flash')
    <form role="form" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-body">
            <div class="form-group">
                <label>Konu</label>
                <input type="text" name="subject" class="form-control input-lg" value="">
            </div>
            <div class="form-group">
                <label>E-Posta Mesajı</label>
                <textarea class="form-control" name="message" rows="10"></textarea>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="submit-btn btn btn-primary btn-lg btn-block login-button">Eposta Gönder</button>
        </div>
    </form>
</div>
@endsection