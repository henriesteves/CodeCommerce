@extends('store.store')

@section('categories')

    @include('store.partial.categories')

@stop

@section('content')

    <div class="col-sm-9 padding-right">
        <h2 class="title text-center">{{ $category->name }}</h2>

        @include('store.partial.products', ['products' => $products])

        <div class="row">
            <div class="col-sm-12">
                {!! $products->render() !!}
            </div>
        </div>

    </div>

@stop