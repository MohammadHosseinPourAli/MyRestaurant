@extends('layouts.nav-links')
@section('menuStyle')
    <style>
        .navBackground {
            background-color: #272727;
            height: 30%;
            position: absolute;
            top: 0;
        }
        .btn{
            width: 30%;
            height: 8%;
            margin-top: 20%;
            margin-right: 1%;
            font-family: WorkSans;
        }
    </style>
@endsection
@section("menu-topSection")
    <section style="width: 100%; height: 70%; background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('Images/OrderBackground.jpg') }}); background-size: 100% 100%; position: absolute; top: 0; left: 0; ">
@endsection
@section("menu-bottomSection")
    </section>
    <section style="margin-top: 35.5%;">
        <center>
            <a href="{{route('menu.addFood')}}"><input type="submit" value="Add food" style="background-color: rgba(9,191,3,0.91); color: white; margin-top: 5%; width: 10%; height: 8%; font-family: WorkSans;"></a>
        </center>
        @foreach($foods as $food)

            <div style="margin-left: 16.5%; display: inline-block; height: 70%; width: 25%; margin-top: 7%; border: 2px solid #ff4433; border-radius: 30px;">
                <center>
                    <form action="{{route('menu.delete', $food->id)}}" method="post">
                        @csrf
                        <img src="{{asset("Images/$food->image")}}" style="height: 35%; margin-top: 10%; border-radius: 12px; width: 60%;">
                        <h1 style="font-family: WorkSans;">{{$food->name}}</h1>
                        <h2 style="font-family: WorkSans;">Price: {{$food->price}}$</h2>
                            <?php
                            $ingredients = $food->ingredients[0];
                            for ($i = 1; $i < count($food->ingredients); $i++){
                                $ingredients = $ingredients . ', ' . $food->ingredients[$i];
                            }
                            ?>
                        <p style="font-family: WorkSans">ingredients: {{$ingredients}}</p>
                        <a href="{{ route('menu.surePanel', $food->id) }}">
                            <button type="button" class="btn" style="background-color: red;">
                                Delete
                            </button>
                        </a>
                        <a href="{{ route('menu.show', $food->id) }}">
                            <button type="button" class="btn" style="background-color: #9ca3af; color: white; border: 1px solid black; margin: 0;">
                                Edit
                            </button>
                        </a>
                    </form>
                </center>
            </div>

        @endforeach
    </section>
@endsection