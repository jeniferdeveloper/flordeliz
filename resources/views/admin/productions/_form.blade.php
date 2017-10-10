
<div class="form-group">
    {!! Form::label('Produto_Id', 'Produto', ['class'=>'col-md-2']) !!}
    {!! Form::select('produto_id', $products, null, ['placeholder'=> 'Selecione um produto','class'=>'form-control']) !!}


</div>

<div class="form-group">
    {!! Form::label('Tamanho', 'Tamanho', ['class'=>'col-md-2']) !!}
    {!! Form::text('tamanho', null, ['disabled', 'class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('Qtd', 'Quantidade', ['class'=>'col-md-2']) !!}
    {!! Form::text('qtd', null, ['class'=>'form-control']) !!}
</div>

