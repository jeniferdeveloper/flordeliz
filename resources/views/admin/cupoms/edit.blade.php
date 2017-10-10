    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Editando cliente <strong>{{$client->user->name}}</strong></h3></div>
</div>
<br /> 
    {!! Form::model($client,['route'=>['admin.clients.update',$client->user->id]]) !!}

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
  @include('admin.clients._form')

 
 <div class="form-group">
{!! Form::submit('Atualizar cliente',['class'=>'btn btn-primary']) !!}
 </div>
    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.clients.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
@endsection
