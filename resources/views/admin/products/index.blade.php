
    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Área Administrativa de Produtos</h3></div>

<br /> 
<a href=" {{ route('admin.products.create') }} " class="btn btn-default">Novo produto</a>
<br /> 
<br /> 
<div class="table-responsive">

<table class="table table-striped table-hover">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Qtd</th>
            <th>Categoria</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
     @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->nome}}</td>
            <td>{{$product->preco}}</td>
            <td>{{$product->qtd}}</td>
            <td>{{$product->category->name}}</td>
            <td>
            <a href="{{ route('admin.products.edit',['id'=>$product->id]) }}" class="btn btn-info">Editar</a>
               <a href="{{ route('admin.products.destroy',['id'=>$product->id]) }}" class="btn btn-danger">Remover</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

</div>
    {!! $products->render() !!}

</div>
</div>
@endsection
