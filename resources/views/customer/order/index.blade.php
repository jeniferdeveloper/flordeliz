@extends('app')
@section('content')
    <div class="container">
        <div class="content">

            <div class="title"><h3>Área Administrativa de Cupoms</h3></div>

            <br/>
            <a href=" {{ route('customer.order.create') }} " class="btn btn-default">Novo</a>
            <br/>
            <br/>
            @if(!empty($orders))
                <div class="table-responsive">

                    <table class="table table-striped table-hover">
                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->status}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            @else
                <div class="alert alert-warning">
                    <h2>Não existe nenhum pedido para sua conta</h2>
                </div>
            @endif
            {!! $orders->render() !!}

        </div>
    </div>
@endsection
