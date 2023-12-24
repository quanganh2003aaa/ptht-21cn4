<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStorerequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Str;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('quantityProduct', '!=' ,0)->OrderBy('created_at', 'DESC')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function search(Request $request){
        $search = $request['search'];
        // dd($search);
        $products = Product::where('nameProduct','LIKE', "%{$search}%")->paginate(10);
        $view = view('products.indexSearch', compact('products'))->render();
        return $view;
    }

    public function index2()
    {
        $products = Product::where('quantityProduct',0)->OrderBy('created_at', 'DESC')->paginate(10);
        return view('products.index2', compact('products'));
    }

    public function search2(Request $request){
        $search = $request['search'];
        // dd($search);
        $products = Product::where([['nameProduct','LIKE', "%{$search}%"],['quantityProduct',0]])->paginate(10);
        $view = view('products.indexSearch', compact('products'))->render();
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::OrderBy('brand')->get();
        return view('products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $request->only('nameProduct', 'brand', 'idProduct', 'sizeProduct', 'priceProduct', 'quantityProduct');
        $product['created_at'] = now();
        $product['updated_at'] = now();
        //tạo tên file
        $fileName = $request->idProduct . '.' . rand(1,1000) . time() . '.' . $request->file('imgProduct')->extension();
        //lưu trữ vào storage
        $request->file('imgProduct')->storeAs('public/product', $fileName);
        //tạo đường dẫn lưu vào db
        $imgPath = 'storage/product/' . $fileName;
        $product['imgProduct']=$imgPath;
        Product::create($product);
        return redirect()->route('products.index')->with('success','Thêm sản phẩm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands=Brand::OrderBy('brand')->get();
        return view('products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->only('nameProduct', 'brand', 'idProduct', 'descriptionProduct', 'priceProduct', 'quantityProduct');
        $data['slug'] = Str::slug($data['nameProduct']);
        $data['updated_at'] = now();

        if($request->imgProduct){
            //xóa file img nếu sửa
            Storage::delete(Str::replace('storage', 'public', $product['imgProduct']));

            //tạo tên file
            $fileName = $request->idProduct . '.' . rand(1,1000) . time() . '.' . $request->file('imgProduct')->extension();
            //lưu trữ vào storage
            $request->file('imgProduct')->storeAs('public/product', $fileName);
            //tạo đường dẫn lưu vào db
            $imgPath = 'storage/product/' . $fileName;
            $data['imgProduct']=$imgPath;
        }
        if($product->update($data)){
            return redirect()->route('products.index')->with('success','Sửa thành công');
        }
        return redirect()->back()->with('error','Sửa thất bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            Storage::delete(Str::replace('storage', 'public', $product['imgProduct']));
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại');

    }
}
