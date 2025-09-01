<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $foods = Food::all();
        return view('order.index', ['foods' => $foods]);
    }
    public function mainFood(){
        $foods = Food::where('category', 'main')->get();
        return view('order.mainFood', ['foods' => $foods]);
    }
    public function drinks(){
        $foods = Food::where('category', 'drinks')->get();
        return view('order.drinks', ['foods' => $foods]);
    }
    public function appetizer(){
        $foods = Food::where('category', 'appetizer')->get();
        return view('order.appetizer', ['foods' => $foods]);
    }
    public function dessert(){
        $foods = Food::where('category', 'dessert')->get();
        return view('order.dessert', ['foods' => $foods]);
    }
    public function updateFoodCount(Request $request){
        $food_id = $request->input('food_id');
        $count = $request->input('count');
        $foodCount = session('foodCount', []);
        $foodCount[$food_id] = $count;
        session(['foodCount' => $foodCount]);
    }
//    public function store(Request $request)
//    {
//
//    }
}
