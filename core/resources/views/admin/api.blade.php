@extends('admin.layouts.master')
@section('page_icon', 'fa fa-cogs')
@section('page_name', 'Api Ayarları')
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <form method="post" action="{{ route('api.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="control-label"><b>API URL</b></label>
                                    <input class="form-control form-control-lg" type="text" id="url" name="url"
                                           value="{{ $item->url or '' }}">
                                    <span class="help-text-url text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><b>API key</b></label>
                                    <input class="form-control form-control-lg" type="text" id="key" name="key"
                                           value="{{ $item->key or '' }}">
                                    <span class="help-text-key text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><b>Durum</b></label>
                                    <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                           data-off="Kapalı" data-on="Açık"
                                           data-width="100%" type="checkbox" value="1"
                                           name="status" {{ $item->status or '' == "1" ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="btn-middle">
                                    <label class="api-msg"></label>
                                    <button class="btn btn-outline-dark btn-block btn-lg test-btn" type="button"><i
                                                class="fa fa-fw fa-lg fa-power-off"></i> Test API
                                    </button>
                                </div>
                            </div>
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
    <script>
        $(document).ready(function () {
            $(document).on('click', '.test-btn', function (e) {
                e.preventDefault();
                $(this).html('<i class="fa fa-spinner fa-spin"></i> Checking API');
                var url = $('#url').val();
                var key = $('#key').val();
                if (url.length == 0) {
                    $('.help-text-url').text('API URL is required');
                    $(this).html('<i class="fa fa-fw fa-lg fa-power-off"></i> Test API');
                }
                if (key.length == 0) {
                    $('.help-text-key').text('API key is required');
                    $(this).html('<i class="fa fa-fw fa-lg fa-power-off"></i> Test API');
                }
                $(document).on('keyup', '#url, #key', function () {
                    $('.help-text-url').text('');
                });
                $(document).on('keyup', '#key', function () {
                    $('.help-text-key').text('');
                });
                if (url.length != 0 && key.length != 0){
                    $.ajax({
                        type: "POST",
                        url: "{{ route('api.test') }}",
                        data: {url : url, key: key},
                        success: function (data) {
                            $('.help-text-url').text('');
                            $('.help-text-key').text('');
                            $('.test-btn').html('<i class="fa fa-fw fa-lg fa-power-off"></i> Test API');
                            if(data <= 3){
                                $('.api-msg').html('<b class="text-danger"><i class="fa fa-times"></i> Your API having an issue. please check your API url and key or this API may not be work with this system.</b>')
                            }else{
                                $('.api-msg').html('<b class="text-success"><i class="fa fa-check"></i> API tasted. You can save these credentials.</b>')
                            }
                        },
                    });
            }
            });
        });
    </script>
@endsection
