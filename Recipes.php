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
                    <a href="#">Recipes</a>
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
        <div id="filter">
        </div>


    </div>

    <div id="components" style="width: 1200px; height: 400px">
        <main class="row">
            <div id="blender1">
                <img  src="images/blender1.png">
            </div>
            <?php
            include "db_Model.php";
            connect();
            $recipes = getRecipesShake();
            echo '<div id="recipes">';
            foreach ($recipes as $recipe) {
                echo '<div class="card text-center" id="localcard">';
                echo '<img class="roundeed mx-auto d-block" width="200px" height="180px" id="recipeimg" src="'.$recipe->picture.'">';
                echo '<div class="card-body" id="buttomcard">';
                echo '<h4 class="card-title">'.$recipe->name.'<button class="buttomstyle btn-components btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="'.$recipe->shake_id.'" " type="submit"><img src="images/smoothie.png"></button></h4>';
                echo '</div> </div>';
            }
            echo '
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button"  data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Recipe details</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table-bordered">
                                        <tr>
                                            <th class="thstyle">Nutritional name</th>
                                            <th class="thstyle">Nutritional values</th>
                                        </tr>
                  ';
                    $Recipes = getRecipeByID(101);
                    $partsArray = array();
                    $partsArray = $Recipes->parts;
                    $partArrayNames = 'Shake parts : ';
                    $TCal = 0;
                    $TPro = 0;
                    $TCar = 0;
                    $TFat = 0;
                    $TVitA = 0;
                    $TVitB = 0;
                    $Tiron = 0;
                    foreach ($partsArray as $part){
                        if ($part){
                            //$partobj = getPartByID(part);
                            $TCal += $part->calories;
                            $TPro += $part->proteins;
                            $TCar += $part->carbo;
                            $TFat += $part->fat;
                            $TVitA += $part->vitaminA;
                            $TVitB += $part->vitaminB;
                            $Tiron += $part->iron;
                            $partArrayNames = $partArrayNames. $part->name;
                            $partArrayNames = $partArrayNames. ", ";
                        }
                    }
            echo'        
                                 
                                 <tr>
                                 <td>Calories
                                 <td>'.$TCal.'
                                 </tr>
                                 
                                 <tr>
                                 <td>Proteins
                                 <td>'.$TPro.'
                                 </tr>
                                 
                                 <tr>
                                 <td>Carbo
                                 <td>'.$TCar.'
                                 </tr>
                                 
                                 <tr>
                                 <td>Fat
                                 <td>'.$TFat.'
                                 </tr>
                                 
                                 <tr>
                                 <td>VitaminA
                                 <td>'.$TVitA.'
                                 </tr>
                                 
                                 <tr>
                                 <td>VitaminB
                                 <td>'.$TVitB.'
                                 </tr>
                                 
                                 <tr>
                                 <td>Iron
                                 <td>'.$TCar.'
                                 </tr>
                                 
                                </table>
                                <br>
                                 <h4>'.$partArrayNames.'</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>';
            ?>
        </main>

    </div>
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