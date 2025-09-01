<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Restuarant</title>
    <link rel="stylesheet" href="{{asset("css/Fonts.css")}}">
    @yield("mainStyle")
    @yield("orderStyle")
    <style>
        nav{
            margin-top: 3%;
        }
        .buttons {
            color: #e3e3e0;
            margin-left: 5%;
            font-family: WorkSans;
            transition: color 0.5s ease;
        }
        .buttons:hover{
            color: #ff4433;
        }
    </style>
</head>
<body>
<header>
    @yield("order-topSection")
    <center>
        <nav>
            <a class="buttons">HOME</a>
            <a class="buttons">ORDER</a>
            <a class="buttons">MY PROFILE</a>
        </nav>
    </center>
    <section style="position: absolute; right: 0; color: #e3e3e0; top: 8%;">
        <a>LOGIN</a>
        <a>REGISTER</a>
    </section>
    @yield("order-bottomSection")
    <img src="{{asset("Images/Logo.png")}}" alt="Logo" style="width: 5%; position: absolute; top: 15px; left: 18px;">
</header>
<main>
    @yield("main")
</main>
</body>
</html>