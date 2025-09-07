@extends("layouts.nav-links")
@section("orderStyle")
    <style>
        span{
            display: inline-block;
            margin-left: 10%;
            margin-top: 1.5%;
        }
        .submitBtn{
            background-color: #ff4433;
            color: white;
            width: 10%;
            height: 5%;
            border: 1px solid #ff4433;
            border-radius: 12px;
        }
        .submitBtn:hover{
            background-color: white;
            color: #ff4433;
        }
    </style>
@endsection
@section("order-topSection")
    <section style="width: 100%; height: 70%; background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('Images/OrderBackground.jpg') }}); background-size: 100% 100%; position: absolute; top: 0; left: 0; ">
@endsection
@section("order-bottomSection")
    </section>
    <section style="margin-top: 35.5%;">
        <div style="width: 100%; background-color: rgba(10,10,10,0.91); position: absolute; left: 0; right: 0; height: 8%;">
            <center>
                <a href="{{route('order.mainFood')}}"><span class="buttons" style="margin-left: 0;">Main Food</span></a>
                <a href="{{route('order.appetizer')}}"><span class="buttons">Appetizer</span></a>
                <a href="{{route('order.dessert')}}"><span class="buttons">ِDessert</span></a>
                <a href="{{route('order.drinks')}}"><span class="buttons">Drink</span></a>
            </center>
        </div>
    </section>
    <section>
        <form action="{{route('order.store')}}" method="post">
            @csrf
            @yield("mainFood")
            @yield("drinks")
            @yield("dessert")
            @yield("appetizer")
            <br><br><br><br>
            <center>
                <input type="submit" value="Submit order" class="submitBtn">
            </center>
        </form>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateSession(foodId, count) {
                fetch("{{ route('update.food.count') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ food_id: foodId, count: count })
                });
            }

            document.querySelectorAll(".btn-increase").forEach(button => {
                button.addEventListener("click", function() {
                    let foodId = this.dataset.id;
                    let countBox = document.querySelector(`.count-box[data-id="${foodId}"]`);
                    let currentValue = parseInt(countBox.value) || 0;
                    let newValue = currentValue + 1;
                    countBox.value = newValue;

                    updateSession(foodId, newValue);
                });
            });

            document.querySelectorAll(".btn-decrease").forEach(button => {
                button.addEventListener("click", function() {
                    let foodId = this.dataset.id;
                    let countBox = document.querySelector(`.count-box[data-id="${foodId}"]`);
                    let currentValue = parseInt(countBox.value) || 0;
                    if (currentValue > 0) {
                        let newValue = currentValue - 1;
                        countBox.value = newValue;

                        updateSession(foodId, newValue);
                    }
                });
            });
        });

    </script>


@endsection
