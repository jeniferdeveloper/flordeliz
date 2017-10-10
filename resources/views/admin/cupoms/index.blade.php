    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Área Administrativa de Cupoms</h3></div>

<br /> 
<a href=" {{ route('admin.cupoms.create') }} " class="btn btn-default">Novo Cupom</a>
<br /> 
<br /> 
<div class="table-responsive">

<table class="table table-striped table-hover">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Cupom</th>
            <th>Validade</th>
            <th>Valor</th>
            <th>Usado?</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
     @foreach($cupoms as $cupom)
        <tr>
            <td>{{$cupom->id}}</td>
            <td>{{$cupom->description}}</td>
            <td>{{$cupom->code}}</td>
            <td>{{$cupom->validade}}</td>
            <td>{{$cupom->value}}</td>
            <td>{{ $cupom->use=== 1 ? 'Sim' : 'Não' }}</td>
            <td>
            <a href="{{ route('admin.cupoms.edit',['id'=>$cupom->id]) }}" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

</div>
    {!! $cupoms->render() !!}

</div>
</div>
@endsection
