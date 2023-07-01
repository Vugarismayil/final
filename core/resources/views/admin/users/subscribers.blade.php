@extends('admin.layouts.master')
@section('page_icon', 'fa fa-users')
@section('page_name', 'Abone Listesi')
@section('addButton')
    <a class="btn btn-outline-success btn-lg" href="{{ route('subscribers.email') }}"><i
                class="fa fa-envelope-o"></i> Posta Gönder</a>
@endsection
@section('body')
    @include('admin.layouts.flash')
    <div class="tile">
        <h3 class="tile-title">Abone Listesi</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>E-Posta</th>
                <th>Ayar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <td>
                        {{ ++$key }}
                    </td>
                    <td>{{$item->email}}</td>
                    <td>
                        <button type="button" class="btn btn-outline-danger btn-unsubscribe" data-toggle="modal" data-target="#deleteSubscriber" data-route="{{ route('admin.unsubsciber', $item->id) }}"><i class="fa fa-times"></i> </button>
                    </td>
                </tr>
            @endforeach
            <tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$items->links()}}
        </div>
    </div>
    <div class="modal fade" id="deleteSubscriber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i><strong> Onayla!</strong> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <strong>Bu abone listeden kaldırmak istiyor musunuz?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="" id="unsubscribe-form">
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
           $(document).on('click', '.btn-unsubscribe', function () {
              var route = $(this).data('route');
              $('#unsubscribe-form').attr('action', route);
           });
        });
    </script>
    @endsection