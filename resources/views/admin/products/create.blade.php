    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Novo Produto</h3></div>
</div>
<br /> 
    @include('errors._check')
    {!! Form::open(['route'=>'admin.products.store']) !!}

    
    @include('admin.products._form')

 <div class="form-group">
{!! Form::submit('Novo Produto',['class'=>'btn btn-primary']) !!}
 </div>
    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.products.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
@endsection
