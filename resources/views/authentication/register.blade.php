<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/Fonts.css")}}">
    <style>
        .topLayer{
            width: 40%;
            height: 10%;
            background-color: #ff4433;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            margin-top: 5%;
            padding-top: 1%;
        }
        .bottomLayer{
            width: 40%;
            height: 100%;
            background-color: white;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }
        body {
            margin: 0;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: linear-gradient(270deg, #cfd9df, #e2ebf0, #f0f0f0);
            background-size: 600% 600%;
            animation: gradientAnimation 12s ease infinite;
            font-family: sans-serif;
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .titles{
            color: #ff4433;
            font-family: WorkSans;
            font-size: 20px;
        }
        .boxes {
            width: 80%;
            padding: 12px 15px;
            font-size: 16px;
            border: 2px solid #e2ebf0;
            border-radius: 10px;
            outline: none;
            transition: all 0.3s ease;
            font-family: WorkSans;
            background-color: #f9f9f9;
        }

        .boxes:focus {
            border-color: #ff4433;
            background-color: white;
            box-shadow: 0 0 8px #ff4433;
        }
        .regBtn{
            background-color: #ff4433;
            color: white;
            width: 30%;
            height: 10%;
            border: 1px solid #ff4433;
            border-radius: 12px;
            font-size: 20px;
        }
        /*.logBtn:hover{*/
        /*    background-color: white;*/
        /*    color: #ff4433;*/
        /*}*/
        .cancelBtn{
            background-color: white;
            color: #ff4433;
            width: 30%;
            height: 10%;
            border: 1px solid #ff4433;
            border-radius: 12px;
            font-size: 20px;
        }
        /*.cancelBtn:hover{*/
        /*    background-color: #ff4433;*/
        /*    color: white;*/
        /*}*/
    </style>
</head>
<body>
<center>
    <section class="topLayer">
        <h1 style="color: white; font-family: WorkSans;">Register</h1>
    </section>
    <section class="bottomLayer">
        <form action="/register" method="post">
            @csrf
            <br><br>
            <label for="name" class="titles">Name:</label>
            <br><br>
            <input type="text" name="name" required class="boxes">
            <br><br>
            <label for="phone" class="titles">Phone Number:</label>
            <br><br>
            <input type="tel" name="phone" required class="boxes">
            <br><br>
            <label for="pass" class="titles">Password:</label>
            <br><br>
            <input type="password" name="pass" required class="boxes">
            <br><br>
            <label for="conPass" class="titles">Confirm Password:</label>
            <br><br>
            <input type="password" name="conPass" required class="boxes">
            <br><br>
            <label for="address" class="titles">Address:</label>
            <br><br>
            <input type="text" name="address" required class="boxes">
            <br><br><br><br><br><br>
            <input type="button" name="cancel" value="Cancel" class="cancelBtn">
            <input type="submit" name="register" value="Register" class="regBtn">
        </form>
    </section>
</center>
</body>
</html>