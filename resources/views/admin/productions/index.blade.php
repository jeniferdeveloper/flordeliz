@extends('app')
@section('content')
    <div class="container">
        <div class="content">

            <div class="title"><h3>Área Administrativa de Produção de Calçados</h3></div>

            <br/>
            <a href=" {{ route('admin.productions.create') }} " class="btn btn-default">Nova produção</a>
            <br/>
            <br/>
            <div class="table-responsive">
                @if(count($productions))
                    <table class="table table-striped table-hover">
                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Tamanho</th>
                            <th>Qtd</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($productions as $production)
                            <tr>
                                <td>{{$production->id}}</td>
                                <td>{{$production->produto->nome}}</td>
                                <td>{{$production->produto->tamanho}}</td>
                                <td>{{$production->qtd}}</td>

                                <td>
                                    <a href="{{ route('admin.productions.edit',['id'=>$production->id]) }}"
                                       class="btn btn-info">Editar</a>

                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning">
                        <h3>Nenhum registro encontrado para produção!.</h3>
                    </div>
                @endif
            </div>
            {!! $productions->render() !!}
        </div>
    </div>


@endsection

