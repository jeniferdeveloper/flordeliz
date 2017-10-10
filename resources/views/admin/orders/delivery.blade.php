@extends('app') @section('content')
    <div class="container">
        <div class="content">
            <div class="title text-center">
                <h3>Área Administrativa de Pedidos Entregas </h3>
            </div>

            <ul>
                <div class="table-responsive">


                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Total</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Entregador</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>#{{ $order->id}}</td>
                                <td>R$ {{ $order->total}}</td>
                                <td>{{ $order->created_at}}</td>
                                <td>{{ $order->client->user->name}}</td>
                                <td>{{ !empty($order->deliveryman) ? $order->deliveryman->name : '-' }}</td>
                                <td>{{ !empty($order->status) ? $order->status : '-' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </ul>
            {{--{!! $orders->render() !!}--}}
        </div>
    </div>
@endsection