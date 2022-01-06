@extends('templates.template')

@section('content')
    <h1 class="text-center">SISTEMA DE CADASTRO DE ENTREGAS</h1> <hr>

    <div class="text-center mt-3 mb-4">
    <a href="{{url('/deliverys/create')}}">
        <button class="btn btn-success">Cadastrar</button>
    </a>
</div>
    </div>

    <div class="col-8 m-auto">
        @csrf
        <table id="table" class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Entrega</th>
                <th scope="col">Motorista</th>
                <th scope="col">Duração</th>
                <th scope="col">Descrição</th>
                <th scope="col">Saida</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>

            @foreach($delivery as $deliverys)
                @php
                    $user=$deliverys->find($deliverys->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$deliverys->id}}</th>
                    <td>{{$deliverys->entrega}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$deliverys->horas}}</td>
                    <td>{{$deliverys->description}}</td>
                    <td>{{$deliverys->saida}}</td>
                    <td>
                        <a href="{{url("deliverys/$deliverys->id/edit")}}">
                             <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="{{url("deliverys/$deliverys->id")}}" class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                        <a href="{{url("deliverys/$deliverys->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection