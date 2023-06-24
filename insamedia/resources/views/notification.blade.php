@extends('layout.app')

@section('content')
    <div class="containerN">
        @if($notifications->count() === 0)
            <h1 class="title text-center">Aucune notifications</h1>
        @else
            @foreach($notifications as $notification)
                <div class="uneNotification">
                    @if($notification->originaire->photo == null)
                        <img class="photoProfileN" src="{{ asset('images/photo_default.jpg') }}"/>
                    @else
                        <img class="photoProfileN" src="{{ asset($notification->originaire->photo) }}"/>
                    @endif
                    <div>
                        <p>Il y a {{$notification->anciennete}}</p>
                        <div class="testN2">
                            <p>{{$notification->contenu}}</p>
                            @if($notification->idtype == 1)
                                <a href="profils/{{$notification->idcompteo}}/accepter" class="btn btn-success bouton boutonAccepter"><i class="fa-solid fa-check"></i></a>
                                <a href="profils/{{$notification->idcompteo}}/refuser" class="btn btn-danger bouton"><i class="fa-solid fa-xmark"></i></a>
                            @elseif($notification->idtype != 4 && $notification->idtype != 5)
                                <a href="notifications/redirect/{{$notification->id}}" class="btn btn-primary bouton"><i class="fa-regular fa-eye"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection