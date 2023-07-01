@extends('admin.layouts.master')
@section('page_icon', 'fa fa-lock')
@section('page_name', 'Şifre Yenile')
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <form method="post" action="{{ route('admin.pass.change')}}">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label"><b>Eski Şifre</b></label>
                            <input class="form-control form-control-lg" type="password" name="cur_pass" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Yeni Şifre</b></label>
                            <input class="form-control form-control-lg" type="password" name="new_pass" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Yeni Şifre (Tekrar)</b></label>
                            <input class="form-control form-control-lg" type="password" name="con_pass" required>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
@endsection