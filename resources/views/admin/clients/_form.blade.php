{{-- <div class="form-group">
 {!! Form::label('User', 'Usuários', ['class'=>'col-md-2']) !!}
 {!! Form::select('user_id', $users, null, ['class'=>'form-control']) !!}
</div> --}}
<section id='section-register'>
    <h3>Dados de Cadastro</h3>
    <div class="form-group">
        {!! Form::label('Name','Nome Cliente',['class'=>'col-md-2']) !!}
        {!! Form::text('user[name]',null,['class'=>'form-control']) !!}
    </div>

    {{--<div class="form-group">--}}
    {{--{!! Form::label('Endereco','Endereço',['class'=>'col-md-2']) !!}--}}
    {{--{!! Form::text('Endereco',null,['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    <div class="form-group">
        {!! Form::label('Cpf','Cpf',['class'=>'col-md-2']) !!}
        {!! Form::text('cpf',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Cnpj','Cnpj',['class'=>'col-md-2']) !!}
        {!! Form::text('cnpj',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Telefone','Telefone',['class'=>'col-md-2']) !!}
        {!! Form::text('telefone',null,['class'=>'form-control']) !!}
    </div>

</section>

<section id='section-access'>
    <h3>Dados de acesso</h3>
    <div class="form-group">
        {!! Form::label('User[email]','Login',['class'=>'col-md-2']) !!}
        {!! Form::email('user[email]',null,['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">--}}
        {{--{!! Form::label('User[password]','Senha',['class'=>'col-md-2']) !!}--}}
        {{--{!! Form::text('user[password]',null,['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    {{--
        <div class="form-group">
         {!! Form::label('User[password]','Senha',['class'=>'col-md-2']) !!}
         {!! Form::text('user[password]',null,['class'=>'form-control']) !!}
        </div> --}}

</section>