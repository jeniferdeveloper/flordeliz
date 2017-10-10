    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Editando categoria <strong>{{ $category->name }}</strong></h3></div>
</div>
<br /> 
    {!! Form::model($category,['route'=>['admin.categories.update',$category->id]]) !!}

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
   @include('admin.categories._form')

 <div class="form-group">
{!! Form::submit('Atualizar categoria',['class'=>'btn btn-primary']) !!}
 </div>
    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.categories.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
@endsection
