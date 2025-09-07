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
            height: 75%;
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
        .editBtn{
            background-color: #ff4433;
            color: white;
            width: 30%;
            height: 10%;
            border: 1px solid #ff4433;
            border-radius: 12px;
            font-size: 20px;
        }
        .cancelBtn{
            background-color: white;
            color: #ff4433;
            width: 30%;
            height: 10%;
            border: 1px solid #ff4433;
            border-radius: 12px;
            font-size: 20px;
        }
    </style>
</head>
<body>
<center>
    <section class="topLayer">
        <h1 style="color: white; font-family: WorkSans;">Edit</h1>
    </section>
    <section class="bottomLayer">
        <form method="post">
            @csrf
            <br><br>
            <label for="name" class="titles">Name</label>
            <br><br>
            <input type="text" name="name" value="{{$food->name}}" required class="boxes">
            <br><br>
            <label for="ingredients" class="titles">Ingredients</label>
            <br><br>
            <?php
                $ingredients = $food->ingredients[0];
                for ($i = 1; $i < count($food->ingredients); $i++){
                    $ingredients = $ingredients . ',' . $food->ingredients[$i];
                }
            ?>
            <input type="text" name="ingredients" value="{{$ingredients}}" required class="boxes">
            <p style="color: #09bf03; font-family: WorkSans;">wite ingredients like this:dough,tomato,mozzarella,basil,olive oil</p>
            <br><br>
            <label for="price" class="titles">Price</label>
            <br><br>
            <input type="text" name="price" value="{{$food->price}}" required class="boxes">
            <br><br><br><br><br><br>
            <input type="button" name="cancel" value="Cancel" class="cancelBtn">
            <input type="submit" name="edit" value="Edit" class="editBtn">
        </form>
    </section>
</center>
</body>
</html>
<script>
    document.querySelector(".cancelBtn").addEventListener("click", function() {
        window.location.href = "/menu";
    });
</script>