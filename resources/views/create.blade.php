@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($delivery)) Editar @else Cadastrar @endif</h1> <hr>
    <div class="col-8 m-auto">

        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($delivery))
            <form name="formEdit" id="formEdit" method="post" action="{{url("deliverys/$delivery->id")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('deliverys')}}">
        @endif
                @csrf
                <input class="form-control" type="text" name="entrega" id="entrega" placeholder="Nome da entrega" value="{{$delivery->entrega ?? ''}}" required><br>
                <select class="form-control" name="id_user"  id="id_user" value="{{$user->name ?? ''}}" required>
                    <option value="{{$delivery->relUsers->id ?? ''}}">{{$delivery->relUsers->name ?? 'Selecionar Motorista'}}</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select><br>
                <input class="form-control" type="time" name="horas" id="horas" value="{{$delivery->horas ?? ''}}" required><br>
                <input class="form-control" type="longtext" name="description" id="description" placeholder="Descrição"  value="{{$delivery->description ?? ''}}" required><br>               
                {{-- <input class="form-control" type="datetime-local" name="saida" id="saida" value="<?= date('Y-m-d\TH:i',strtotime($delivery->saida))?>" required><br>       --}}
                <input class="btn btn primary" type="submit" value="Cadastrar">
                </form>
    </div>
@endsection