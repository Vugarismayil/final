@extends('admin.layouts.master')
@section('page_icon', 'fa fa-credit-card')
@section('page_name', 'Ağ Geçidi Listesi')
@section('body')
<div class="tile">
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
                    Detaylar
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($users)==0)
            <tr class="text-center">
                <td colspan="5"><h2>Sonuç bulunamadı</h2></td> 
            </tr>
            @else
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->name}}
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
                    <a href="{{route('admin.user-single', $user->id)}}" class="btn btn-outline btn-circle btn-sm green">
                        <i class="fa fa-eye"></i> Görüntüle </a>
                    </td>
                </tr>
                @endforeach 
                @endif
                <tbody>
                </table>
            </div>
            
            
            @endsection