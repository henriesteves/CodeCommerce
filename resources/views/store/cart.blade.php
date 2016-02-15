@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Preço</td>
                        <td class="qtd">Quantidade</td>
                        <td class="total">Total</td>
                        <td class=""></td>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($cart->all() as $k => $item)
                        <tr>
                            <td class="cart_product">
                                @if(isset($item['image']))
                                    <img src="{{ url('uploads/' . $item['image']) }}" alt="" width="110"/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="110"/>
                                @endif
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ number_format($item['price'], 2, "," , ".") }}
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{ route('store.cart.add', ['id' => $k]) }}"> + </a>
                                    <input class="cart_quantity_input" name="quantity" value="{{ $item['qtd'] }}" autocomplete="off" size="2" type="text">
                                    <a class="cart_quantity_down" href="{{ route('store.cart.remove-item', ['id' => $k]) }}"> - </a>
                                </div>
                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{ number_format($item['price'] * $item['qtd'], 2, "," , ".")  }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('store.cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="" colspan="5"><p>Seu carrinho está vazio.</p></td>
                        </tr>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span style="margin-right: 100px">
                                    TOTAL: R$ {{ number_format($cart->getTotal(), 2, "," , ".") }}
                                </span>
                                <a href="{{ route('store.checkout.place') }}" class="btn btn-success">Fechar a compra</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

@stop