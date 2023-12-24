<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::OrderBy('brand')->get();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = $request->only('brand');
        $brand['created_at'] = now();
        $brand['updated_at'] = now();

        Brand::create($brand);
        return redirect()->route('brands.index')->with('success','Thêm nhà cung cấp thành công');
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
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $data = $request->only('brand');
        $data['updated_at'] = now();

        if($brand->update($data)){
            return redirect()->route('brands.index')->with('success','Sửa thành công');
        }
        return redirect()->back()->with('error','Sửa thất bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại');
    }
}
