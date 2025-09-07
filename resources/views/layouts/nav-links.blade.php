<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Restuarant</title>
    <link rel="stylesheet" href="{{asset("css/Fonts.css")}}">
    @yield("mainStyle")
    @yield("orderStyle")
    @yield("myOrdersStyle")
    @yield('menuStyle')
    @yield("empOrdersStyle")
    <style>
        nav{
            margin-top: 3%;
        }
        .buttons {
            color: #e3e3e0;
            margin-left: 5%;
            font-family: WorkSans;
            transition: color 0.5s ease;
            text-decoration: none;
            outline: none;
        }
        .buttons:hover{
            color: #ff4433;
        }
    </style>
</head>
<body>
<header>
    @yield("order-topSection")
    @yield('menu-topSection')
    <center>
        <nav>
            <a href="/" class="buttons">HOME</a>
            @if(Auth::check())
                @if(Auth::user()->role == 'customer')
                    <a href="{{route('order')}}" class="buttons">ORDER</a>
                    <a href="{{route('profile.edit')}}" class="buttons">MY PROFILE</a>
                    <a href="{{route('order.myOrders')}}" class="buttons">MY ORDERS</a>
                @endif
                    @if(Auth::user()->role == 'employee')
                        <a href="{{route('menu')}}" class="buttons">MENU</a>
                        <a href="{{route('profile.edit')}}" class="buttons">MY PROFILE</a>
                        <a href="{{route('emp-orders')}}" class="buttons">ORDERS</a>
                    @endif
            @endif
        </nav>
    </center>
    @if(Auth::check())
        <div style="position: absolute; top: 6.5%; right: 30px; font-family: WorkSans;">
            <a href="{{route('profile.edit')}}" style="margin-right: 15px; color: #e3e3e0; text-decoration: none; transition: color 0.3s;">{{Auth::user()->name}}</a>
        </div>
    @else
        <div style="position: absolute; top: 6.5%; right: 30px; font-family: WorkSans;">
            <a href="{{route('login')}}" style="margin-right: 15px; color: #ff4433; text-decoration: none; transition: color 0.3s;">LOGIN</a>
            <a href="{{route('register')}}" style="color: #ff4433; text-decoration: none; transition: color 0.3s;">REGISTER</a>
        </div>
    @endif

    <img src="{{asset("Images/Logo.png")}}" alt="Logo" style="width: 5%; position: absolute; top: 15px; left: 18px;">
</header>
<main>
    @yield("main")
    @yield("order-bottomSection")
    @yield('myOrders')
    @yield("menu-bottomSection")
    @yield('empOrders')
</main>
</body>
</html>