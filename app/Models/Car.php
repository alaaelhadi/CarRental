<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'luggage',
        'doors',
        'passengers',
        'price',
        'active',
        'image',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public static function carCount($category_id) {
        $carsCount = Car::where(['category_id' => $category_id])->count();
        return $carsCount;
    }
}
