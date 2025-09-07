<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Food_Order;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        $ordersFoods = [];
        $foods = Food::all();
        foreach (session('foodCount') as $index => $count) {
            if($count != 0){
                $orderFood = new Food_Order();
                $orderFood->food_id = $index;
                $orderFood->order_id = 0;
                $orderFood->count = $count;
                array_push($ordersFoods, $orderFood);
            }
        }
        //dd($ordersFoods);
        if (isset($ordersFoods)) {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->save();
            foreach ($ordersFoods as &$order_foods){
                $order_foods->order_id = $order->id;
                $order_foods->save();
            }
            session(['foodCount' => []]);
            return redirect()->intended('/');
        }
    }
    public function myOrders(){
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('order.myOrders', ['orders' => $orders]);
    }
    public function emp_orders()
    {
        $orders = Order::where('status', 'pending')->get();
        return view('order.employee.orders', ['orders' => $orders]);
    }
    public function updateOrdersStatus(Request $request)
    {
        $action = $request->input('status');
        if ($action == 'accept') {
            $order = Order::find($request->input('order_id'));
            $order->status = 'accepted';
            $order->save();
        }else if($action == 'decline'){
            $order = Order::find($request->input('order_id'));
            $order->status = 'declined';
            $order->save();
        }
        return redirect('/orders');
    }
}
