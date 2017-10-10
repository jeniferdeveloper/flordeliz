@extends('app') @section('content')
    <div class="container">
        <div class="content">
            {!! Form::model(null,['route'=>['admin.orders.destroy',$pedidoId]]) !!}

            <div class="title text-center">
                <h1 class="alert alert-success">Deletar Pedido: <strong>{{$pedidoId}}</strong> </h1>
                <h3 class="alert alert-success">Deseja realmente excluir esse pedido?</h3>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Sim', ['class'=>'btn btn-danger']) !!}
                <a href="{{ route('admin.orders.index')}}" class="btn btn-info">Não</a>

            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection


