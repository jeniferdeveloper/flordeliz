 @extends('app') @section('content')
<div class="container">
    <div class="content">
        <div class="title text-center">
            <h3>Área Administrativa de Pedidos </h3>
        </div>

        <ul>
<div class="table-responsive">

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
                                <li>{{ $item->product->name}}</li>
                                @endforeach
                            </ul>

                        </td>
                        <td>{{ $order->client->user->name}}</td>
                        <td>{{ !empty($order->deliveryman) ? $order->deliveryman->name : '-' }}</td>
                        <td>{{ !empty($order->status) ? $order->status : '-' }}</td>
                        <td>
                         <a href="{{ route('admin.orders.edit',['id'=>$order->id]) }}" class="btn btn-info">Editar</a>
                        <a href="{{ route('admin.orders.delete',['id'=>$order->id]) }}" class="btn btn-danger">Remover</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
 </div>
        </ul>
        {!! $orders->render() !!}
    </div>
</div>
@endsection