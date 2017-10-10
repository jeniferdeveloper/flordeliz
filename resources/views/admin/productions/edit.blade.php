@extends('app')
@section('content')
    <div class="container">
        <div class="content">

            <div class="title"><h3>Editando Produção do Calçado <strong>{{ $producao->produto->nome }}</strong></h3>
            </div>
        </div>
        <br/>

        @include('errors._check')
        {!! Form::model($producao,['route'=>['admin.productions.update',$producao->id]]) !!}

        @include('admin.productions._form')

        <div class="form-group">
            {!! Form::submit('Atualizar Produção',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
        <div class="form-group">
            <a href=" {{ route('admin.productions.index') }} " class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection

@section('post-script')
    <script>

        $(document).ready(function () {

            $('select[name=produto_id]').change(function () {
                var productSelected = $(this).val();
                if (productSelected.length) {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '/admin/productions/obterProdutoTamanho/' + productSelected,
//                    data: {id: productSelected},
                        success: function (response) {

                            if (response && response.data) {
                                console.log(response.data.tamanho);
                                $('input[name=tamanho]').val(response.data.tamanho);
                            } else {
                                console.log(response);

                            }
                        }
                    });
                }
                $('input[name=tamanho]').val('');


            });
        });
    </script>
@endsection