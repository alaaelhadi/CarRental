<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('Admin.carsList', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('Admin.addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string|max:400',
            'luggage' => 'required|string|numeric',
            'doors' => 'required|string|numeric',
            'passengers' => 'required|string|numeric',
            'price' => 'required|string|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ], $messages);
        $data['active'] = isset($request['active']);
        $filename = $this->uploadFile($request->image, 'adminAssets/images');
        $data['image'] = $filename;
        Car::create($data);
        return redirect('admin/carsList');
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
        $car = Car::findOrFail($id);
        $categories = Category::get();
        return view('Admin.updateCar', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string|max:400',
            'luggage' => 'required|numeric',
            'doors' => 'required|numeric',
            'passengers' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ], $messages);
        $data['active'] = isset($request['active']);
        if($request->hasFile('image')){
            $filename = $this->uploadFile($request->image, 'adminAssets/images');
            $data['image'] = $filename;
        }
        Car::where('id', $id)->update($data);
        return redirect('admin/carsList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::where('id', $id)->delete();
        return redirect('admin/carsList');
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field is required',
            'title.string' => 'Title must be string',
            'content.required' => 'Content field is required',
            'content.string' => 'Content must be string',
            'content.max' => 'Content must be at maximum 400 characters',
            'luggage.required' => 'Luggage field is required',
            'luggage.numeric' => 'Luggage must be number',
            'doors.required' => 'Doors field is required',
            'doors.numeric' => 'Doors must be number',
            'passengers.required' => 'Passengers field is required',
            'passengers.numeric' => 'Passengers must be number',
            'price.required' => 'Price field is required',
            'price.numeric' => 'Price must be number',
            'image.required' => 'Image field is required',
            'image.mimes' => 'Image must be png, jpg, jpeg',
            'category_id.required' => 'Category field should be selected'
          ];
    }
}
