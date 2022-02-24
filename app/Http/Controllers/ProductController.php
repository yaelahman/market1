<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->get();

        $data = [
            'product' => $product
        ];

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->status = 1;

            if ($product->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Product created successfully');

                DB::commit();
                return redirect()->to(route('product.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('product.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $data = [
            'product' => $product
        ];

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->status = 1;

            if ($product->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Product updated successfully');

                DB::commit();
                return redirect()->to(route('product.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('product.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product->delete()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Product deleted successfully');
            return redirect()->to(route('product.index'));
        }
    }
}
