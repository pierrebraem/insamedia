@extends('layout.app')

@section('content')
    <div class="containerN">
        @if($notifications->count() === 0)
            <h1 class="title text-center">Aucune notifications</h1>
        @else
            @foreach($notifications as $notification)
                <div class="uneNotification">
                    @if($notification->originaire->photo === null)
                        <img class="photoProfileN" src="{{ asset('images/photo_default.jpg') }}"/>
                    @else
                        <img class="photoProfileN" src="{{ asset($notification->originaire->photo) }}"/>
                    @endif
                    <div>
                        <p>Il y a 32min</p>
                        <div class="testN2">
                            <p>{{$notification->contenu}}</p>
                            @if($notification->idtype === 1)
                                <a href="profils/{{$notification->idcompteo}}/accepter" class="btn btn-success bouton boutonAccepter"><i class="fa-solid fa-check"></i></a>
                                <a href="profils/{{$notification->idcompteo}}/refuser" class="btn btn-danger bouton"><i class="fa-solid fa-xmark"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection