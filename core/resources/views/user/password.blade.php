@extends('user.layouts.master')
@section('site_title', 'Şifre Değiştir')
@section('page_title')
    <i class="fa fa fa-unlock-alt"></i> Şifre Değiştir
@endsection
@section('body')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('user.layouts.flash')
            <div class="card">
                <div class="card-body">
            <form method="post" action="{{ route('user.pass.change') }}">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label"><b>Eski Şifreniz</b></label>
                        <input type="password" class="form-control form-control-lg" name="cur_pass" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Yeni Şifreniz</b></label>
                        <input type="password" class="form-control form-control-lg" name="new_pass" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Yeni Şifre Tekrar</b></label>
                        <input type="password" class="form-control form-control-lg" name="con_pass" required>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary btn-block btn-lg" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i>Kaydet
                    </button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
@endsection