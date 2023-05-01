@extends('layout.app')

@section('content')
    <div class="containerN">
        <!-- Notification a aimé une image -->
        <div class="uneNotification">
            <img src="{{ asset('images/photo_exemple1.png') }}" class="photoProfileN" alt="exemple1"/>
            <div>
                <p>Il y a 3H</p>
                <div class="testN">
                    <p>FrenchBrave a aimé votre image : 'mon cheval'</p>
                    <a href="#" class="btn btn-primary boutonVisio"><i class="fa-solid fa-eye"></i></a>
                </div>
            </div>          
        </div>

        <!-- Notification a aimé une publication -->
        <div class="uneNotification">
            <img src="{{ asset('images/photo_exemple2.png') }}" class="photoProfileN" alt="exemple1"/>
            <div>
                <p>Il y a 1J</p>
                <div class="testN">
                    <p>DarkUranium a aimé un de vos posts : Manger 5 fruits et légumes par jour!</p>
                    <a href="#" class="btn btn-primary bouton boutonVisio"><i class="fa-solid fa-eye"></i></a>
                </div>
            </div>          
        </div>

        <!-- Notification pour une mention -->
        <div class="uneNotification">
            <img src="{{ asset('images/photo_exemple3.png') }}" class="photoProfileN" alt="exemple1"/>
            <div>
                <p>Il y a 32min</p>
                <div class="testN">
                    <p>EmeraudeDragon vous a mentionné dans une publication : Visite à Paris avec @Cumulo</p>
                    <a href="#" class="btn btn-primary bouton boutonVisio"><i class="fa-solid fa-eye"></i></a>
                </div>
            </div>          
        </div>

        <!-- Notification pour une demande d'amis -->
        <div class="uneNotification">
            <img src="{{ asset('images/photo_exemple4.png') }}" class="photoProfileN" alt="exemple1"/>
            <div>
                <p>Il y a 2H</p>
                <div class="testN2">
                    <p>Mr.X veut être votre amis</p>
                    <a href="#" class="btn btn-success bouton boutonAccepter"><i class="fa-solid fa-check"></i></a>
                    <a href="#" class="btn btn-danger bouton"><i class="fa-solid fa-xmark"></i></a>
                </div>
            </div>          
        </div>
    </div>
@endsection