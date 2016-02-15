<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $productModel)
    {
        //$this->middleware('auth');

        $this->productModel = $productModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$products = $this->productModel->all();
        //$products = $this->productModel->paginate(10);
        // Eager Loading
        $products = $this->productModel->with('category', 'images', 'tags')->paginate(10);


        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();

        $input['featured'] = isset($input['featured']) ? 1 : 0;

        $input['recommend'] = isset($input['recommend']) ? 1 : 0;

        //dd($input);

        $product = $this->productModel->fill($input);

        //dd($product);

        $product->save();

        $product->tags()->sync($this->getTagIds($request->tags));

        return redirect()->route('admin.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->productModel->find($id);

        //dd($product);

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        $input = $request->all();

        $input['featured'] = isset($input['featured']) ? 1 : 0;

        $input['recommend'] = isset($input['recommend']) ? 1 : 0;

        //$this->productModel->find($id)->update($input);

        $product = $this->productModel->find($id);

        $product->update($input);

        $product->tags()->sync($this->getTagIds($request->tags));

        return redirect()->route('admin.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        if ($this->productModel->find($id)->images->count()) {

            $images = $this->productModel->find($id)->images;

            foreach ($images as $image) {
                if (file_exists(public_path() . '/uploads/' . $image->id . '.' . $image->extension)) {
                    Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
                }
            }
        }

        $this->productModel->find($id)->delete();

        return redirect()->route('admin.products');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function  storeImage(Requests\ProductImageResquest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('admin.products.images', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if (file_exists(public_path() . '/uploads/' . $image->id . '.' . $image->extension)) {

            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);

        }

        $product = $image->product;

        $image->delete();

        return redirect()->route('admin.products.images', ['id' => $product->id]);
    }

    private function getTagIds($tags)
    {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));

        $tagsID = [];

        foreach($tagList as $tagName) {
            $tagsID[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagsID;
    }
}
