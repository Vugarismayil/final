@extends('admin.layouts.master')
@section('page_icon', 'fa fa-ticket')
@section('page_name')
  Bilet #{{ $ticket->ticket }}
@endsection
@section('addButton')
    <a href="{{ route('admin.ticket') }}" class="btn btn-outline-danger btn-lg"><i
                class="fa fa-backward"></i> Geri</a>
@endsection
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                        <b class="ticket-design">Konu : </b> <strong>{{ $ticket->subject }} </strong>
                        <span class="pull-right"><b class='support-btn open-support-btn'>
                                    <h5>
                                    @if($ticket->status == 0 || $ticket->status == 1)
                                          Bilet Durumu : <font color="darkgreen"> Açık</font>
                                        @elseif($ticket->status == 2)
                                          Bilet Durumu : <font color="blue"> Müşteri Cevapladı</font>
                                        @elseif($ticket->status == 4)
                                          Bilet Durumu : <font color="red"> Kapalı </font>
                                        @endif
                                    </h5></b>
                                </span>
                        <div class="row">
                            <div class="col-md-12 product-service md-margin-bottom-30">
                                <ol class="commentlist noborder nomargin nopadding clearfix">
                                    @foreach($messages as $message)
                                        @if($message->type == 1)
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <li class="comment even thread-even depth-1" id="li-comment-1">
                                                        <div id="comment-1" class="comment-wrap clearfix">
                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                <span class="comment-avatar clearfix">
                                                                    <img alt=""
                                                                         src="{{ asset('assets/frontend/upload/profile') }}/{{ $ticket->user->image }}"
                                                                         class="avatar avatar-60 photo avatar-default"
                                                                         width="60" height="60"></span>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content clearfix">
                                                                <div class="comment-author"><a href="{{ route('admin.user-single', $ticket->user_id) }}">{{ $ticket->user->name }}</a>
                                                                    <span>{{ $message->created_at->format('d F, Y - h:i A') }}</span>
                                                                </div>
                                                                <p>{{ $message->message }}</p>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        @elseif($message->type == 2)
                                            <div class="row">
                                                <div class="col-md-10 offset-md-2">

                                                    <li class="comment even thread-even depth-1" id="li-comment-1">
                                                        <div id="comment-1" class="comment-wrap clearfix">
                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                <span class="comment-avatar clearfix">
                                                                    <img alt=""
                                                                         src="{{ asset('assets/frontend/upload/logo/logo.png') }}"
                                                                         class="avatar avatar-60 photo avatar-default"
                                                                         width="60" height="60"></span>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content clearfix">
                                                                <div class="comment-author">
                                                                    Temsilci<span>{{ $message->created_at->format('d F, Y - h:i A') }}</span>
                                                                </div>
                                                                <p>{{ $message->message }}</p>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>

                        </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('admin.ticket.send', $ticket->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label"><b>Mesaj</b></label>
                                <textarea class="form-control" name="message"
                                          rows="5"></textarea>
                            </div>
                            <div class="row">
                                @if($ticket->status != 4)
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block btn-lg" type="submit" name="replayTicket" value="1"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i>Cevapla
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger btn-block btn-lg" type="button" data-toggle="modal" data-target="#DelModal"><i
                                                class="fa fa-fw fa-lg fa-times-circle"></i>Kapat
                                    </button>
                                </div>
                                    @else
                                    <div class="col-md-12">
                                    <button class="btn btn-danger btn-block btn-lg" type="submit" name="replayTicket" value="1"><i
                                                class="fa fa-fw fa-lg fa-times-circle"></i>Kapat
                                    </button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i><strong>Onayla!</strong> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <strong>Bu Destek Bileti'ni kapatmak istediğinizden emin misiniz?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('admin.ticket.send', $ticket->id) }}">
                        @csrf
                        @method('PUT')
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kapat</button>
                        <button type="submit" class="btn btn-primary custom-btn-background" name="replayTicket" value="2"><i class="fa fa-check"></i> Evet,Eminim.</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection