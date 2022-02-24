<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->get();

        $data = [
            'category' => $category
        ];

        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            $category = new Category();
            $category->name = $request->name;
            $category->status = 1;

            if ($category->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Category created successfully');

                DB::commit();
                return redirect()->to(route('category.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('category.index'));
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
        $category = Category::find($id);

        $data = [
            'category' => $category
        ];

        return view('category.edit', $data);
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
            $category = Category::find($id);
            $category->name = $request->name;
            $category->status = 1;

            if ($category->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Category updated successfully');

                DB::commit();
                return redirect()->to(route('category.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('category.index'));
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
        $category = Category::find($id);

        if ($category->delete()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Category deleted successfully');
            return redirect()->to(route('category.index'));
        }
    }
}
