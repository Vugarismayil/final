@extends('user.layouts.master')
@section('site_title', 'Hesabım')
@section('page_title')
    <i class="fa fa-user"></i> Hesabım
@endsection
@section('body')
    <div class="row">
        @include('user.layouts.flash')
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
            <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><b>Adınız</b></label>
                            <input type="text" class="form-control input-lg" name="name" value="{{ $item->name }}"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><b>Telefon</b></label>
                            <input type="text" class="form-control input-lg" name="mobile" value="{{ $item->mobile }}"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="padding-bottom: 4px;" for=""><b>Resim
                                    (Desteklenen : jpg/jpeg/png)</b></label>
                        </div>
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 300px; height: 150px; margin: -20px 0 5px 0;">
                                <img src="{{ asset('assets/frontend/upload/profile') }}/{{ $item->image != null ? $item->image : 'default.jpg'}}" id="newimg"
                                     style="width: 300px; height: 150px;"/>
                            </div>
                             <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><b>Ülke</b></label>
                            <input type="text" class="form-control input-lg" name="country" value="{{ $item->country }}"
                                   required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><b>Şehir</b></label>
                            <input type="text" class="form-control input-lg" name="city" value="{{ $item->city }}"
                                   required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><b>Posta Kodu</b></label>
                            <input type="text" class="form-control input-lg" name="post_code"
                                   value="{{ $item->post_code }}" required="">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg" type="submit"><i
                            class="fa fa-fw fa-lg fa-check-circle"></i>Kaydet
                </button>
            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change', '#image', function () {
                readURL(this);
            });
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#newimg').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
@endsection