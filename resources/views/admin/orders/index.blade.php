@extends('app') @section('content')
    <div class="container">
        <div class="content">
            <div class="title text-center">
                <h3>Área Administrativa de Pedidos </h3>
            </div>

            <ul>
                <div class="table-responsive">

                    <a href=" {{ route('customer.order.create') }} " class="btn btn-default">Novo Pedido</a>
                    <a href=" {{ route('admin.orders.delivery') }} " class="btn btn-success">Visualizar Entregas</a>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Total</th>
                            <th>Data</th>
                            <th>Items</th>
                            <th>Cliente</th>
                            <th>Entregador</th>
                            <th>Status</th>
                            <th>Acão</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>#{{ $order->id}}</td>
                                <td>R$ {{ $order->total}}</td>
                                <td>{{ $order->created_at}}</td>
                                <td>
                                    <ul>
                                        @foreach($order->items as $item)
                                            <li>{{ $item->product->nome}}</li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td>{{ $order->client->user->name}}</td>
                                <td>{{ !empty($order->deliveryman) ? $order->deliveryman->name : '-' }}</td>
                                <td>{{ !empty($order->status) ? $order->status : '-' }}</td>
                                <td>

                                    <a href="{{ route('admin.orders.edit',['id'=>$order->id]) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('admin.orders.delete',['id'=>$order->id]) }}" class="btn btn-danger">Excluir</a>
                                    {{--<a data-order-id="{{$order->id}}" class="btn btn-danger"--}}
                                       {{--data-toggle="modal" data-target="#confirmDelete"--}}
                                       {{--data-title="Deletar Pedido"--}}
                                       {{--data-message="Deseja realmente Excluir esse pedido de nº {{$order->id}}?">--}}
                                        {{--Excluir</a>--}}
                                {{--<a --}}
                                {{--class="btn btn-danger">Remover</a></td>--}}
                                {{--<button  --}}
                                {{--</button>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </ul>

        {!! $orders->render() !!}
        <!-- Modal Dialog -->
            <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Deseja</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning">
                                <strong><p>Are you sure about this ?</p></strong>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                            <button type="button" class="btn btn-danger" id="confirm">Sim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



{{--@section('post-script')--}}
    {{--<script>--}}
        {{--$('#confirm').click(function () {--}}
            {{--// handle deletion here--}}
            {{--var id = $('.modal').data('id');--}}
            {{--console.log('ID Order Model: ' + id);--}}
            {{--var urlRequest = '{{route('admin.orders.delete', ['id'])}}';--}}

            {{--$.ajax({--}}
                {{--type: 'POST',--}}
                {{--dataType: 'json',--}}
                {{--url: urlRequest.replace('id', id),--}}
                {{--data: {'_token': '{{ csrf_token() }}', id: id},--}}
                {{--success: function (response) {--}}

                    {{--if (response && response.data) {--}}
                        {{--console.log(response.data.url);--}}
                        {{--$(location).attr('href',response.data.url);--}}
                    {{--} else {--}}
                        {{--console.log(response);--}}

                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}

        {{--$('#confirmDelete').on('show.bs.modal', function (e) {--}}

            {{--var id = $('.btn-danger').data("order-id");--}}
            {{--console.log('ID Order: ' + id);--}}

            {{--$message = $(e.relatedTarget).attr('data-message');--}}
            {{--$(this).find('.modal-body p').text($message);--}}
            {{--$title = $(e.relatedTarget).attr('data-title');--}}
            {{--$(this).data('id', id);--}}
            {{--$(this).find('.modal-title').text($title);--}}

            {{--// Pass form reference to modal for submission on yes/ok--}}
            {{--var form = $(e.relatedTarget).closest('form');--}}
            {{--$(this).find('.modal-footer #confirm').data('form', form);--}}
{{--//            $('body').append('<div id="myModal" class="modal">\n' +--}}
{{--//                '\n' +--}}
{{--//                '</div><div class="modal-header">\n' +--}}
{{--//                '        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>\n' +--}}
{{--//                '         <h3>Delete</h3>\n' +--}}
{{--//                '    </div>\n' +--}}
{{--//                '    <div class="modal-body">\n' +--}}
{{--//                '        <p>Deseja realmente deletar o Pedido nº:'+ id +'</p>\n' +--}}
{{--//                '        <p>Confirmar ?</p>\n' +--}}
{{--//--}}
{{--//                '    </div>\n' +--}}
{{--//                '    <div class="modal-footer">\n' +--}}
{{--//                '      <a href="#" id="btnYes" class="btn danger">Yes</a>\n' +--}}
{{--//                '      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>\n' +--}}
{{--//                '    </div>\n' +--}}
{{--//                '</div>\n' );--}}
{{--//--}}
{{--//            $('#myModal').data('id', id).modal('show');--}}
{{--//--}}


        {{--});--}}

    {{--</script>--}}
{{--@endsection--}}
