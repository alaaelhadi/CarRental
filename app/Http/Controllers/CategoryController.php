<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Car;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('Admin.categoriesList', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'categoryName' => 'required|string'
        ], $messages);
        Category::create($data);
        return redirect('admin/categoriesList');
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
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.updateCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'categoryName' => 'required|string'
        ], $messages);
        Category::where('id', $id)->update($data);
        return redirect('admin/categoriesList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Categories = Car::where('category_id', $id)->count();
        if($Categories > 0){
            return redirect()->back()->with('message', 'You cannot delete this category because it is related to a car');
        }
        else{
            Category::where('id', $id)->delete();
            return redirect('admin/categoriesList');
        }
        
    }

    public function messages()
    {
        return [
            'categoryName.required' => 'Category Name field is required',
            'categoryName.string' => 'Category Name must be string',
          ];
    }
}
