@extends('templates.template')

@section('content')
<h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        @php
            $user=$delivery->find($delivery->id)->relUsers;
        @endphp
        Entrega: {{$delivery->entrega}}<br>
        Horario de entrega: {{$delivery->horas}}<br>
        Descrição: {{$delivery->description}}<br>
        Motorista: {{$user->name}} <br>
        Saida: {{$delivery->saida}} <br>
    </div>
@endsection