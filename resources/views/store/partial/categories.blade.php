<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categorias</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @foreach($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <?php // <a href="{{ url('category/' . $category->id) }}">{{ $category->name }}</a> ?>
                        <a href="{{ route('store.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                    </h4>
                </div>
            </div>
            @endforeach

        </div><!--/category-products-->
    </div>
</div>