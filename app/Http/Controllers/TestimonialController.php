<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Testimonial;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('Admin.testimonialsList', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.addTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'content' => 'required|string|max:400',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ], $messages);
        $data['published'] = isset($request['published']);
        $filename = $this->uploadFile($request->image, 'adminAssets/images');
        $data['image'] = $filename;
        Testimonial::create($data);        
        return redirect('admin/testimonialsList');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('Admin.updateTestimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'content' => 'required|string|max:400',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048'
        ], $messages);
        $data['published'] = isset($request['published']);
        if($request->hasFile('image')){
            $filename = $this->uploadFile($request->image, 'adminAssets/images');
            $data['image'] = $filename;
        }
        Testimonial::where('id', $id)->update($data);        
        return redirect('admin/testimonialsList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect('admin/testimonialsList');
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'name.string' => 'Name must be string',
            'position.required' => 'Position field is required',
            'position.string' => 'Position must be string',
            'content.required' => 'Content field is required',
            'content.string' => 'Content must be string',
            'content.max' => 'Content must be at maximum 400 characters',
            'image.required' => 'Image field is required',
            'image.mimes' => 'Image must be png, jpg, jpeg'
          ];
    }
}
