    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Área Administrativa de Categorias</h3></div>

<br /> 
<a href=" {{ route('admin.categories.create') }} " class="btn btn-default">Nova Categoria</a>
<br /> 
<br /> 
<div class="table-responsive">

<table class="table table-striped table-hover">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
     @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
            <a href="{{ route('admin.categories.edit',['id'=>$category->id]) }}" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

</div>
    {!! $categories->render() !!}

</div>
</div>
@endsection
