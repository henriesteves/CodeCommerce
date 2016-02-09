@extends('store.store')

@section('categories')

    @include('store.categories_partial')

@stop

@section('content')

    <div class="col-sm-9 padding-right">

        @foreach($products as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">

                            @if(count($product->images))
                                <img src="{{ url('uploads/' . $product->images->first()->id . '.' . $product->images->first()->extension) }}" alt="" width="200"/>
                            @else
                                <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
                            @endif

                            <h2>R$ {{ number_format($product->price,2,",",".") }}</h2>
                            <p>{{ $product->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Maisdetalhes</a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionarno carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{ number_format($product->price, 2, "," , ".") }}</h2>
                                <p>{{ $product->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionarno no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@stop