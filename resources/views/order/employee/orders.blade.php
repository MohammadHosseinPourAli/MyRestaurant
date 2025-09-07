@extends('layouts.nav-links')
@section('empOrdersStyle')
    <style>
        .order{
            width: 80%;
            height: 35%;
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
        .btn {
            width: 10%;
            margin-left: 60%;
            height: 20%;
            color: white;
            border-radius: 8px;
        }
    </style>
@endsection
@section('empOrders')
    <section>
        @foreach($orders as $order)
            <form action="{{route('update-orders-status')}}" method="post">
                @csrf
                <div class="order">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <h2 style="margin-left: 5%;">Customer: {{$order->user->name}}</h2>
                    <h3 style="margin-left: 5%;">Order: </h3>
                    @foreach($order->foods as $food)
                        <h3>{{$food->pivot->count}}-{{$food->name}}, </h3>
                    @endforeach
                    <h4 style="margin-left: 5%;">Address: {{$order->user->address}}</h4>
                    <button type="submit" name="status" value="accept" class="btn" style="background-color: rgba(9,191,3,0.91);">
                        Accept
                    </button>
                    <button type="submit" name="status" value="decline" class="btn" style="margin-left: 5%; background-color: red;">
                        Decline
                    </button>
                </div>
            </form>
        @endforeach
    </section>
@endsection