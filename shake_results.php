<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="includes/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="includes\js\js.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BuildShake</title>
</head>
<body>
<div id="warpper">
    <header>
        <a href="#">ShakeIT</a>
        <nav class="nav" id="navigation">
            <ul>
                <li>
                    <a id="selected" href="#">Build Shake</a>
                </li>
                <li>
                    <a href="#">History</a>
                </li>
                <li>
                    <a href="#">Favorite</a>
                </li>
                <li>
                    <a href="#">Recipes</a>
                </li>
                <li>
                    <a href="#">Supplay</a>
                </li>
            </ul>
        </nav>
    </header>
<div id="ftable">
    <table id=shakeTable" style="width:80%">
        <tr>
            <th>Name</th>
            <th>Calorie</th>
            <th>Protein</th>
            <th>Carbo</th>
            <th>Fat</th>
            <th>Vit A</th>
            <th>Vit B</th>
            <th>Iron</th>
        </tr>

       <?php
       include "db_Model.php";
       connect();
       if (1) {
           $items = $_POST["data"];
           foreach($items as $item){

               $part = getPartByID($item);
               echo "<tr>
                        <td>'.$part->name.'</td>
                        <td>'.$part->calories.'</td>
                        <td>'.$part->proteins.'</td>
                        <td>'.$part->carbo.'</td>
                        <td>'.$part->fat.'</td>
                        <td>'.$part->vitaminA.'</td>
                        <td>'.$part->vitaminB.'</td>
                        <td>'.$part->iron.'</td>
                     </tr>";
           }
       }else{
           echo "NO DATA!";
       }
       ?>
    </table>
</div>

    <div style="width: 1200px; height: 400px">
        <main class="row">
            <section id="orderList" class="alert alert-info" role="alert">
                <p> Shake components : </p>
                <button id="orederBtn" onclick="chooseParts()" class="btn btn-primary"><a href="ShakeValue.html"> </a>  Shake IT </button>
            </section>
            </section>
            <div id="blender1">
                <img  src="images/blender1.png">
            </div>

        </main>

    </div>


</div>
<script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="includes/js/scripts.js"></script>
<footer>

</footer>
</body>
</html>