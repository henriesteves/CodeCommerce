@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Orders</h1>

            <table class="table">
                <tr>
                    <th>Order #</th>
                    <th>User</th>
                    <th>Itens</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            <ul>
                                @foreach($order->items as $item)
                                    <li>{{ $item->product->name }} | {{ $item->qtd }} | R$ {{ $item->price }} |
                                        R$ {{ $item->qtd * $item->price }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>R$ {{ $order->total }}</td>
                        <td>
                            @if ( $order->status == 0)
                                Pedido Realizado
                            @elseif ( $order->status == 1)
                                Pagamento Autorizado
                            @elseif ( $order->status == 2)
                                Emissão de Nota Fiscal
                            @elseif ( $order->status == 3)
                                Produto em Transporte
                            @elseif ( $order->status == 4)
                                Produto Entregue
                            @elseif ( $order->status == 5)
                                Cancelado
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}">Edit</a> |
                            <a href="{{ route('admin.orders.destroy', ['id' => $order->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>

            {!! $orders->render() !!}

        </div>
    </div>
@endsection