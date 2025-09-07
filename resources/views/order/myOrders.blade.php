@extends('layouts.nav-links')
@section('myOrdersStyle')
    <style>
        .order{
            width: 80%;
            height: 30%;
            border: 2px solid #ff4433;
            border-radius: 25px;
            /*position: absolute;*/
            margin-left: 10%;
            margin-top: 10%;
            color: white;
            font-family: WorkSans;
        }
        h3{
            display: inline-block;
        }
        body {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('Images/myOrdersBackground.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }
    </style>
@endsection
@section('myOrders')
    <section>
        @foreach($orders as $order)

            <div class="order">
                <h2 style="margin-left: 5%;">Customer: {{$order->user->name}}</h2>
                <h3 style="margin-left: 5%;">Order: </h3>
                @foreach($order->foods as $food)
                    <h3>{{$food->pivot->count}}-{{$food->name}}, </h3>
                @endforeach
                <h4 style="margin-left: 5%;">Address: Iran-Khouzestan-Khoramshar</h4>
            </div>
        @endforeach
    </section>
@endsection