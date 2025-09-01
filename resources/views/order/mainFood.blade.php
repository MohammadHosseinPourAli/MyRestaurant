@extends("order.index")
@section("mainFood")
@foreach($foods as $food)
    <div style="margin-left: 16.5%; display: inline-block; height: 70%; width: 25%; margin-top: 7%; border: 2px solid #ff4433; border-radius: 30px;">
        <center>
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
            <h3>Count:</h3>
            <input type="button" class="btn-decrease" data-id="{{$food->id}}" style="height: 10%; background-color: red; width: 15%;" value="-">
            <input type="text" class="count-box" data-id="{{$food->id}}" style="width: 30%; height: 10%; text-align: center;" value="{{session('foodCount')[$food->id] ?? 0}}" readonly>
            <input type="button" class="btn-increase" data-id="{{$food->id}}" style="height: 10%; background-color: #09bf03; width: 15%;" value="+">
        </center>
    </div>
@endforeach
@endsection