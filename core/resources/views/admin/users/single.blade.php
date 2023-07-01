@extends('admin.layouts.master')
@section('page_icon', 'fa fa-user')
@section('page_name', 'Kullanıcı detayları')
@section('body')
<div class="tile">
  <div class="row">
     @include('admin.layouts.flash')
    <div class="col-md-4">
      <p>E-posta : <strong>{{ $user->email }}</strong></p>
      <p>Kullanıcı adı : <b>{{ $user->username }}</b></p>
    </div>
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-money fa-3x"></i>
        <div class="info">
          <h4>BAKIYE</h4>
          <p><b>{{round($user->balance, 2)}} {{ $general->currency_symbol }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-money fa-3x"></i>
        <div class="info">
          <h4>HARCANMIŞ</h4>
          <p><b>{{round($spent, 2)}} {{ $general->currency_symbol }}</b></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tile">
  <div class="row">
    <div class="col-md-3">
      <a href="{{route('admin.user-email',$user->id)}}" class="btn btn-lg btn-block btn-primary" style="margin-bottom:10px;">E-Posta Gönder</a>
    </div>
    <div class="col-md-3">
      <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#changepass">Şifre Değiştir</button>        
    </div>
    <div class="col-md-3">
      <a href="{{route('user.service.price', $user->id)}}" class="btn btn-lg btn-block btn-info" style="margin-bottom:10px;">Servis Ücreti</a>
    </div>
	<div class="col-md-3">
      <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#balance">Bakiye (Pasif)</button>   
    </div>

  </div> 
</div>


<div class="tile">
  <h3 class="tile-title">Profili Güncelle</h3>
  <div class="tile-body">
    
	 <form id="form" method="post" action="{{route('admin.user-status', $user->id)}}" enctype="multipart/form-data">
          @csrf
		  @method('put')
    <div class="row">
        <div class="form-group col-md-4">
          <label>Kullanıcı adı</label>
          <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
		
        <div class="form-group col-md-4">
          <label>Telefon</label>
          <input type="text" name="mobile" class="form-control" value="{{$user->mobile}}">
        </div>
		
        <div class="form-group col-md-4">
          <label>E-posta</label>
          <input type="email" name="email" class="form-control" value="{{$user->email}}">
        </div>
      </div>
	  
      <div class="row">
        <div class="form-group col-md-4">
          <label>Ülke</label>
          <input type="text" name="country" class="form-control" value="{{$user->country}}">
        </div>
		
        <div class="form-group col-md-4">
          <label>Şehir</label>
          <input type="text" name="city" class="form-control" value="{{$user->city}}">
        </div>
		
        <div class="form-group col-md-4">
          <label>Posta Kodu</label>
          <input type="text" name="post_code" class="form-control" value="{{$user->post_code}}">
        </div>
		
      </div>
	  
      <div class="row">
        <div class="form-group col-md-6">
          <label>Kullanıcı Durumu</label>
          <div class="toggle lg">
              <label>
                <input type="checkbox"value="1" name="status" {{ $user->status == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
              </label>
            </div>
        </div>
        <div class="form-group col-md-6">
          <label>Eposta Doğrulama</label>
          <div class="toggle lg">
            <label>
              <input type="checkbox" value="1" name="emailv" {{ $user->email_verify == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="row">
        <button type="submit" class="btn btn-lg btn-primary btn-block">Güncelle</button>
      </div>     
    </form>
  </div>
</div>




<!--Change Pass Modal -->
<div id="changepass" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title pull-left">Şifre Değiştir</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{route('admin.user-pass', $user->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Şifre</label>
            
            
            <input id="password" type="password" class="form-control" name="password" required>
            
            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            
          </div>
          
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Şifre Onayla</label>
            
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            
            @if ($errors->has('password_confirmation'))
            <span class="help-block">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
            
          </div>
          
          <div class="form-group">
            
            <button type="submit" class="btn btn-primary btn-block">
              Şifre Değiştir
            </button>
          </div>
        </form>
      </div>
      
    </div>
    
  </div>
</div>


<!--Change Pass Modal -->
<div id="balance" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title pull-left">Bakiye Ekle / Çıkar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" method="get" action="" enctype="multipart/form-data">
          @csrf
          @method('put')
                                    <div class="form-group">
                                        <label for=""><b>Ekle / Çıkar</b></label>
                                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Bakiye Ekle" data-off="Bakiye Sil" data-width="100%" type="checkbox" name="action" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Miktar</b></label>
                                        <input type="number" name="amount" class="form-control form-control-lg" required>
                                    </div>


          
          
          <div class="form-group">
            
            <button type="submit" class="btn btn-primary btn-block">
              Bakiye Ekle
            </button>
          </div>
        </form>
      </div>
      
    </div>
    
  </div>
</div>




@endsection


