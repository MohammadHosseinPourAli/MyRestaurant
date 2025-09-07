<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{
    public function index(){
        if (Auth::user()->role == 'employee') {
            $foods = Food::all();
            return view('menu.index', ['foods' => $foods]);
        }
    }
    public function create()
    {
        if (Auth::user()->role == 'employee') {
            return view('menu.create');
        }
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:50000',
        ]);
        $food = new Food();
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->ingredients = explode(",", $request->input('ingredients'));
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $request->input('name') . '.' . $file->getClientOriginalExtension();
            $file->move('public/Images/', $filename);
            $food->image = $filename;
        }
        $food->category = $request->input('category');
    }
    public function show($id)
    {
        if (Auth::user()->role == 'employee') {
            $food = Food::findOrFail($id);
            return view('menu.edit', ['food' => $food]);
        }
    }
    public function edit_store($id, Request $request)
    {
        $food = Food::find($id);
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->ingredients = explode(",", $request->get('ingredients'));
        $food->save();
        return redirect('/menu');
    }
    public function surePanel($id)
    {
        return view('menu.surePanel', ['id' => $id]);
    }
    public function delete($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect('/menu');
    }

}
