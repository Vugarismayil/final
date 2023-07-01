@extends('admin.layouts.master')
@section('page_icon', 'fa fa-user-secret')
@section('page_name', 'Yasaklanan Kullanıcılar Listesi')
@section('body')
<div class="tile">
    <h3 class="tile-title">Yasaklı Kullanıcı Listesi</h3>
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Adı 
                        </th>
                        <th>
                            E-Posta
                        </th>
                        <th>
                            Kullanıcı Adı
                        </th>
                        <th>
                             Telefon
                        </th>
                       	<th>
                       		Bakiye
                       	</th>
                        <th>
                       		Harcanmış
                       	</th>
                        <th>
                            Ayrıntılar
                        </th>
                  	 </tr>
                </thead>
                <tbody>
		 	@foreach($users as $user)
                     <tr>
                     	<td>
                                <a href="{{route('admin.user-single', $user->id)}}">{{$user->name}}</a>
                        </td>
                        <td>
                            {{$user->email}}      
                        </td> 
                        <td>
                            {{$user->username}}      
                        </td>
                        <td>
                            {{$user->mobile}}
                        </td>
                        <td>
                        	{{round($user->balance)}} {{$general->currency_symbol}}
                        </td>
                         <td>
                             @php
                                 $spent = \App\Order::where('user_id', $user->id)->sum('price');
                             @endphp
                             {{$spent}} {{ $general->currency_symbol }}
                         </td>
                        <td>
                        	<a href="{{route('admin.user-single', $user->id)}}" class="btn btn-outline-info">
                             <i class="fa fa-eye"></i></a>
                        </td>
                     </tr>
 			@endforeach 
 			<tbody>
           </table>
    <div class="d-flex justify-content-center">
            {{$users->links()}}
    </div>
        </div>
@endsection
@section('scripts')
    @endsection