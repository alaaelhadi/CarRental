<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Testimonial;

class IndexController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->take(6)->get()->where('active','=', 1);
        $testimonials = Testimonial::latest()->take(3)->get()->where('published','=', 1);
        return view('User.index', compact('cars', 'testimonials'));
    }

    public function listing()
    {
        $cars = Car::paginate(6);
        $testimonials = Testimonial::latest()->take(3)->get()->where('published','=', 1);
        return view('User.listing', compact('cars', 'testimonials'));
    }

    public function single(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::get();
        return view('User.single', compact('car', 'categories'));
    }

    public function testimonial()
    {
        $testimonials = Testimonial::get()->where('published','=', 1);
        return view('User.testimonials', compact('testimonials'));
    }

    public function blog()
    {
        return view('User.blog');
    }

    public function about()
    {
        return view('User.about');
    }

    public function contact()
    {
        return view('User.contact');
    }

    public function page404()
    {
        return view('User.page404');
    }
}
