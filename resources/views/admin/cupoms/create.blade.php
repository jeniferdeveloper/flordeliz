    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Novo Cupom</h3></div>
</div>
<br /> 
    {!! Form::open(['route'=>'admin.cupoms.store','class'=>'form form-horizontal', 'role'=>'form']) !!}

    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
   @include('admin.cupoms._form')

 <div class="form-group">
{!! Form::submit('Criar Cupom',['class'=>'btn btn-primary']) !!}
 </div>
    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.cupoms.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ URL::asset('assets/js/generator-code.js')}}"></script>
@endsection
