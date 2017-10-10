
<section id='section-access'>
    <h3>Entregador</h3>
 
<div class="form-group">
    {!! Form::label('Delivery', 'Entregador', ['class'=>'col-md-2']) !!} {!! Form::select('user_deliveryman_id', $deliverymans, null, ['class'=>'form-control'])
    !!}
</div>
</section>
<section id='section-register'>
    <h3>Dados de Entrega</h3>
    <div class="form-group">
        {!! Form::label('Client[Name]','Nome Cliente',['class'=>'col-md-2']) !!} {!! Form::text('client[user][name]',null,['class'=>'form-control','readonly'=>'true'])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('Cliente','Login',['class'=>'col-md-2']) !!} {!! Form::email('client[user][email]',null,['class'=>'form-control'])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('Client[Address]','Endereço',['class'=>'col-md-2']) !!} {!! Form::text('client[address]',null,['class'=>'form-control','readonly'=>'true'])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('Client[Zipcode]','Cep',['class'=>'col-md-2']) !!} {!! Form::text('client[zipcode]',null,['class'=>'form-control'])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('Client[Phone]','Telefone',['class'=>'col-md-2']) !!} {!! Form::text('client[phone]',null,['class'=>'form-control'])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('Client[City]','Cidade',['class'=>'col-md-2']) !!} {!! Form::text('client[city]',null,['class'=>'form-control'])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('Client[State]','UF',['class'=>'col-md-2']) !!} {!! Form::text('client[state]',null,['class'=>'form-control'])
        !!}
    </div>
</section>

