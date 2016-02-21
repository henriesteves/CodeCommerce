Olá, {{ $user->name }}! Seu pedido foi concluído com sucesso.

Dados da sua compra:

Pedido número: {{ $order->id }}

<ul>
    @foreach($order->items as $item)
        <li>Nome do Produto: {{ $item->product->name }} | Quantidade: {{ $item->qtd }} | Valor unitário: {{ $item->price }} | Total {{ $item->qtd * $item->price }}</li>
    @endforeach
</ul>

Valor total do pedido: R$ {{ $order->total }}

Obrigado pela preferencia!