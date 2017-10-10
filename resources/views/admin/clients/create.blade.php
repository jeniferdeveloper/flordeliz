@extends('app')
@section('content')
    <div class="container">
        <div class="content">

            <div class="title"><h3>Novo Cliente</h3></div>
        </div>
        <br />
        {!! Form::open(['route'=>'admin.clients.store']) !!}

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

        @include('admin.clients._form')

        <div class="form-group">
            {!! Form::submit('Criar Cliente',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
        <div class="form-group">
            <a href=" {{ route('admin.clients.index') }} " class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection
