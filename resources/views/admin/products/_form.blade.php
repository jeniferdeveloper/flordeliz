
    <div class="form-group">
     {!! Form::label('Categoria', 'Categorias', ['class'=>'col-md-2']) !!}
     {!! Form::select('categoria_id', $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
     {!! Form::label('Nome', 'Nome', ['class'=>'col-md-2']) !!}
     {!! Form::text('nome', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
     {!! Form::label('Descricao', 'Descrição', ['class'=>'col-md-2']) !!}
     {!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Tamanho', 'Tamanho', ['class'=>'col-md-2']) !!}
        {!! Form::text('tamanho', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Cor', 'Cor', ['class'=>'col-md-2']) !!}
        {!! Form::text('cor', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
     {!! Form::label('Preco', 'Preço', ['class'=>'col-md-2']) !!}
     {!! Form::text('preco', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
     {!! Form::label('Barcode', 'Código de Barra', ['class'=>'col-md-2']) !!}
     {!! Form::text('barcode', null, ['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Qtd', 'Quantidade', ['class'=>'col-md-2']) !!}
     {!! Form::text('qtd', null, ['class'=>'form-control']) !!}      
    </div>

      <div class="form-group">
     {!! Form::label('Ativo', 'Ativo?', ['class'=>'col-md-2']) !!}
     {!! Form::checkbox('ativo', null, ['class'=>'form-control']) !!}
    </div>