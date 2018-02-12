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
        <div id="logo">
            <a href="#">ShakeIT</a>
        </div>
        <nav class="nav" id="navigation">
            <ul>
                <li>
                    <a id="selected" href="buildShake.php">Build Shake</a>
                </li>
                <li>
                    <a href="#">History</a>
                </li>
                <li>
                    <a href="#">Favorite</a>
                </li>
                <li>
                    <a href="Recipes.php">Recipes</a>
                </li>
                <li>
                    <a href="#">Supplay</a>
                </li>
            </ul>
        </nav>
    </header>
    <div id="topline">
        <label class="container" id="filter">Available
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
        </label>
        <div id = "selected1">
            <div class="stage" id="base" onclick="showBase()"><P>Base</P></div>
            <div class="stage" id="ingredients" onclick="showFruts()"><P>Ingredients</P></div>
            <div class="stage" id="extras" onclick="showExtra()"><P>Extras</P></div>
        </div>
        </div>


    </div>

    <div id="components" style="width: 1200px; height: 400px">
        <main class="row">
            <section id="orderList" class="alert alert-info" role="alert">
                <p> Shake components : </p>
                <button id="orederBtn" onclick="chooseParts()" class="btn btn-primary"><a href="ShakeValue.html"> </a>  Shake IT </button>
            </section>
            </section>
            <div id="blender1">
                <img  src="images/blender1.png">
            </div>
            <?php
            include "db_Model.php";
            $customShake = new Shake();
            connect();
            $partsBase = getPartByType(1);
            $partsFruts = getPartByType(2);
            $partsExtra = getPartByType(3);
            echo '<div id="partsBase">';
            foreach ($partsBase as $part) {
                echo '<div class="card text-center" id="localcard">';
                $patameters = '$part->part_id'.",".'$part->picture';
                echo '<img class="roundeed mx-auto d-block" width="100px" height="100px" src="'.$part->picture.'">';
                echo '<div class="card-body" id="buttomcard">';
                echo '<h4 class="card-title">'.$part->name.'<button class="buttomstyle btn-components" id="cardbuttom-'.$part->part_id.'" onClick="addToShake('.$part->part_id.',\''.$part->picture.'\')" type="submit"><img src="images/smoothie.png"></button></h4>';
                echo '</div> </div>';
            }
            echo '</div>';
            echo '<div id="partsFruts">';
            foreach ($partsFruts as $part) {
                echo '<div class="card text-center" id="localcard">';
                $patameters = '$part->part_id'.",".'$part->picture';
                echo '<img class="roundeed mx-auto d-block" width="100px" height="100px" src="'.$part->picture.'">';
                echo '<div class="card-body" id="buttomcard">';
                echo '<h4 class="card-title">'.$part->name.'<button class="buttomstyle btn-components" id="cardbuttom-'.$part->part_id.'" onClick="addToShake('.$part->part_id.',\''.$part->picture.'\')" type="submit"><img src="images/smoothie.png"></button></h4>';
                echo '</div> </div>';
            }
            echo '</div>';
            echo '<div id="partsExtra">';
            foreach ($partsExtra as $part) {
                echo '<div class="card text-center" id="localcard">';
                $patameters = '$part->part_id'.",".'$part->picture';
                 echo '<img class="roundeed mx-auto d-block" width="100px" height="100px" src="'.$part->picture.'">';
                echo '<div class="card-body" id="buttomcard">';
                echo '<h4 class="card-title">'.$part->name.'<button class="buttomstyle btn-components" id="cardbuttom-'.$part->part_id.'" onClick="addToShake('.$part->part_id.',\''.$part->picture.'\')" type="submit"><img src="images/smoothie.png"></button></h4>';
                echo '</div> </div>';
            }
            echo '</div>';
            ?>
        </main>

    </div>

    <div  id="result">
    </div>




</div>
<script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>

<script>
    $.getJSON( "includes/Profile.json", function( dataprofile ) {
        var profile = document.getElementById("profiles");
        for(var k in dataprofile.profiles) {
            var linode = document.createElement("li");
            var checkbox = document.createElement("input");
            checkbox.setAttribute("type", "checkbox");
            linode.setAttribute("id", "Prodroplist");
            linode.appendChild(checkbox);
            linode.appendChild(document.createTextNode(dataprofile.profiles[k].profile_name));
            profile.appendChild(linode);
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="includes/js/scripts.js"></script>
<footer>

</footer>
</body>
</html>