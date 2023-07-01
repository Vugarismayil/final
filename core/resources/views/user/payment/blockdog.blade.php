@extends('user.layouts.master')
@section('site_title', 'Deposit Via BlockIO')
@section('page_title')
	<i class="fa fa-shopping-basket"></i> Deposit Via BlockIO
@endsection
@section('body')
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
						<h3 class="panel-title text-center">Deposit via {{$page_title}}</h3>
					</div>
					<div class="card-body text-center">
							<h4> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }}</span> DOGECOIN</h4>
							<h5>TO <span style="color: green"> {{ $wallet}}</span></h5>
							{!! $qrurl !!}
							<h4 style="font-weight:bold;">SCAN TO SEND</h4>
					</div>
				</div>
			</div>
		</div>
@endsection