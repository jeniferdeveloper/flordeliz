@extends('app')
@section('content')
    <div class="container">
        @include('errors._check')
        {!! Form::open(['route'=>'customer.order.store','class'=>'form']) !!}
        <div class="title"><h3>Área Administrativa - Pedidos Clientes</h3></div>
        <br/>
        <div class="alert alert-success">
            <div class="row">
                <div class="col-md-2">
                     <span><strong>Total:</strong>
                <small id="total"></small>
            </span>
                </div>
                <div class="col-md-4">
                     <span><strong>Meu Carrinho:</strong>  </span>
               <span id="qtd-carrinho" class="badge"></span>

                </div>
            </div>



        </div>
        <br/>
        <a href="#" id="btnNewItem" class="btn btn-default">Novo Item</a>
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('desconto','Desconto',['class'=>'col-md-2']) !!}
                    {!! Form::text('desconto',null,['class'=>'form-control'])        !!}

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                        {!! Form::label('cliente_id', 'Cliente', ['class'=>'col-md-2']) !!}
                        {{--{!! Form::select('cliente_id', $clientes, null, ['placeholder'=> 'Selecione um cliente','class'=>'form-control']) !!}--}}

                    <select class="form-control" name="cliente_id" id="cliente_id">
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $p)
                            <option value="{{ $p->id }}">{{ $p->user->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

        </div>


        <br />
        <div class="table-responsive">

            <table class="table table-striped table-hover">
                <thead>

                <tr>


                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select class="form-control" name="items[0][produto_id]" id="items[0][produto_id]">
                            @foreach($products as $p)
                                <option value="{{$p->id}}" data-price="{{$p->preco}}">{{$p->nome}}
                                    -- {{$p->preco}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>

                        {!! Form::text('items[0][qtd]', 1, ['class'=>'form-control']) !!}
                    </td>

                    <td>

                        {!! Form::text('items[0][valorTotal]', null, ['class'=>'form-control']) !!}
                    </td>
                    {{-- <a href="{{ route('admin.clients.edit',['id'=>$client->id]) }}" class="btn btn-info">Editar</a>
                    <a href="#" class="btn btn-danger">Excluir</a> --}}
                    </td>

                </tr>

                </tbody>
            </table>

        </div>
        <div class="form-group">
            {!! Form::submit('Criar Pedido', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection
@section('post-script')
    <script>

        $('#btnNewItem').click(function () {
            var row = $('table tbody > tr:last'),
                newRow = row.clone(),
                length = $('table tbody tr').length;

            newRow.find('td').each(function () {

                var td = $(this),
                    input = td.find('input, select'),
                    name = input.attr('name');

                input.attr('name', name.replace((length - 1) + '', length + ''));
            });

            newRow.find('input[name*=qtd]').val(1);

            newRow.insertAfter(row);
            calculateTotal();
        });

        $(document.body).on('click', 'select', function () {
            calculateTotal();

        });

        $(document.body).on('blur', 'input[name*=qtd], input[name*=desconto]', function () {
            calculateTotal();
        });


        function calculateTotal() {
            var total = 0,
                qtdcarrinho =0,
                trLen = $('table tbody tr').length,
                tr = null, price, qtd;

            var desconto = $('input[name*=desconto]').val();


            for (var i = 0; i < trLen; i++) {
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input[name*=qtd]').val();
                total += price * qtd;

                 $(tr).find('input[name*=valorTotal]').val(price * qtd);

                $(tr).find('input[name*=qtd]').each(function(){
                    qtdcarrinho += parseInt($(this).val()); //<==== a catch  in here !! read below

                });


                console.log('Qtd Itens: ' + qtdcarrinho);
            }

            if(desconto.length)
                total -=desconto;

            $('#qtd-carrinho').empty();
            $('#qtd-carrinho').html(qtdcarrinho);
            $('#total').html(total);
        }
    </script>
@endsection