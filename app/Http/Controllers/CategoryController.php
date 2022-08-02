<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('CategoryName')->paginate(4);
        return view('admin.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'CategoryName' => $request->CategoryName,
            'CategorySlug' =>Str::slug($request->CategoryName),
        ]);
        toastr()->success('Thêm mới thành công');
        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $CategorySlug)
    {
        $category = Category::where('CategorySlug', $CategorySlug)->first();
        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $CategorySlug)
    {
        $category = Category::where('CategorySlug', $CategorySlug)->first();
        $category->CategoryName = $request->CategoryName;
        $category->CategorySlug = Str::slug($request->CategoryName);
        $category->save();
        toastr()->success('Chỉnh sửa thành công');
        return redirect()->Route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $CategorySlug)
    {
        $category = Category::where('CategorySlug', $CategorySlug)->first();
        $category->delete();
        toastr()->success('Xóa thành công');
        return redirect()->Route('category');
    }
}
