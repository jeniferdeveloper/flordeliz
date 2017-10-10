@extends('app')
@section('content')
    <div class="container">
        @include('errors._check')
        {!! Form::open(['route'=>'customer.order.store','class'=>'form']) !!}
        <div class="title"><h3>Área Administrativa de Listagem de produtos</h3></div>
        <br/>
        <div class="alert alert-success">
            <h2>Total:
                <small id="total"></small>
            </h2>
        </div>
        <br/>
        <a href="#" id="btnNewItem" class="btn btn-default">Novo Pedido</a>
        <br/>
        <div class="table-responsive">

            <table class="table table-striped table-hover">
                <thead>

                <tr>


                    <th>Produto</th>
                    <th>Quantidade</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select class="form-control" name="items[0][product_id]" id="items[0][product_id]">
                            @foreach($products as $p)
                                <option value="{{$p->id}}" data-price="{{$p->price}}">{{$p->name}}
                                    -- {{$p->price}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>

                        {!! Form::text('items[0][qtd]', 1, ['class'=>'form-control']) !!}
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

            newRow.find('input').val(1);

            newRow.insertAfter(row);
            calculateTotal();
        });

        $(document.body).on('click', 'select', function () {
            calculateTotal();

        });

        $(document.body).on('blur', 'input', function () {
            calculateTotal();
        })


        function calculateTotal() {
            var total = 0,
                trLen = $('table tbody tr').length,
                tr = null, price, qtd;

            for (var i = 0; i < trLen; i++) {
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                total += price * qtd;
            }

            $('#total').html(total);
        }
    </script>
@endsection