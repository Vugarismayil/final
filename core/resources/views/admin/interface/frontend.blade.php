@extends('admin.layouts.master')
@section('page_icon', 'fa fa-desktop')
@section('page_name', 'Önsayfa Ayarları')
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <form method="post" action="{{ route('admin.frontend.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"><i class="fa fa-sticky-note"></i> Slider Kısmı Ayarları</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Resim
                                                    (Desteklenen : jpg/jpeg/png)</b></label>
                                        </div>
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                             style="width: 300px; height: 150px; margin: -20px 0 5px 0;">
                                            <img src="{{ asset('assets/frontend/upload/logo/header-bg.png') }}" id="newimg"
                                                 style="width: 300px; height: 150px;"/>
                                        </div>
                                        <input type="file" name="banner_image" class="form-control-file" id="image">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><b>Başlık</b></label>
                                            <input class="form-control form-control-lg" type="text" value="{{ $item->banner_heading }}" name="banner_heading">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><b>Kısa Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="banner_des" rows="5" name="banner_des">{!! $item->banner_des !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"> <i class="fa fa-sticky-note"></i> Servis Modüllerimiz</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Kısa Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="service_des" rows="5" name="service_des">{!! $item->service_des !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"> <i class="fa fa-sticky-note"></i> Hakkımızda {{ $general->title }} Bölümü</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="about_us" rows="5" name="about_us">{!! $item->about_us !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"> <i class="fa fa-sticky-note"></i> Mutlu Müşteri Yorumları</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Kısa Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="testimonial_des" rows="5" name="testimonial_des">{!! $item->testimonial_des !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"> <i class="fa fa-sticky-note"></i> Sistem Genel Analizi</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Kısa Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="achivment_des" rows="5" name="achivment_des">{!! $item->achivment_des !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"> <i class="fa fa-sticky-note"></i> SıkÇa Sorulan Sorular</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Kısa Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="faq_des" rows="5" name="faq_des">{!! $item->faq_des !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"><i class="fa fa-sticky-note"></i> İletişim Bölümü</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Telefon</b></label>
                                    <input class="form-control form-control-lg" type="text" value="{{ $item->contact_phone }}" name="contact_phone">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><b>E-Posta</b></label>
                                    <input class="form-control form-control-lg" type="email" value="{{ $item->contact_email }}" name="contact_email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><b>Adres</b></label>
                                    <textarea class="form-control form-control-lg" id="contact_address" rows="5" name="contact_address">{!! $item->contact_address !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"><i class="fa fa-sticky-note"></i>Alt Bilgi Ayarları</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Alt Bilgi Copyright</b></label>
                                    <input class="form-control form-control-lg" type="text" value="{{ $item->footer_heading }}" name="footer_heading">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><b>Alt Bilgi Sol Yazı</b></label>
                                    <textarea class="form-control" rows="5" name="footer_text" id="footer_text">{!! $item->footer_text !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"> <i class="fa fa-sticky-note"></i> İletişim Sayfa Ayarı</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Kısa Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="contact_des" rows="5" name="contact_des">{!! $item->contact_des !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-dark">
                                <h4 class="text-center text-success"> <i class="fa fa-sticky-note"></i> API Sayfa Ayarı</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label"><b>Kısa Açıklama</b></label>
                                    <textarea class="form-control form-control-lg" id="api_des" rows="5" name="api_des">{!! $item->api_des !!}</textarea>
                                </div>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            bkLib.onDomLoaded(function() {
                nicEditors.editors.push(
                    new nicEditor().panelInstance(
                        document.getElementById('footer_text')
                    ),
                new nicEditor().panelInstance(
                    document.getElementById('contact_address')
                ),
                    new nicEditor().panelInstance(
                        document.getElementById('banner_des')
                    ),
                    new nicEditor().panelInstance(
                        document.getElementById('service_des')
                    ),
                    new nicEditor().panelInstance(
                        document.getElementById('testimonial_des')
                    ),
                    new nicEditor().panelInstance(
                        document.getElementById('achivment_des')
                    ),new nicEditor().panelInstance(
                        document.getElementById('faq_des')
                    )
                );
            });
            //image Preview

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