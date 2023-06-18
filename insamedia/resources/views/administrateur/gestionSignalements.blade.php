@extends('layout.app')

@section('content')
    <div class="container">
        @foreach($signalements as $signalement)
            <div class="card" style="margin-top: 5px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p>{{$signalement->description}}</p>
                        </div>
                        <div class="col">
                            <p>{{$signalement->nombrePublication}}</p>
                        </div>
                        <div class="col">
                            <a href="/administrateur/signalements/{{$signalement->idPublication}}" class="btn btn-primary">Consulter</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection