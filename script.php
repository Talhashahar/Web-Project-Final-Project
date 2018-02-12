

    <?php
    include "db_Model.php";
    connect();
    if (1) {
        $items = $_POST["data"];
        $calories = 0;
        $proteins = 0;
        $carbo = 0;
        $fat = 0;
        $vitaminA = 0;
        $vitaminB = 0;
        $iron = 0;
        foreach($items as $item){

            $part = getPartByID($item);
            $calories += $part->calories;
            $proteins += $part->proteins;
            $carbo += $part->carbo;
            $fat += $part->fat;
            $vitaminA += $part->vitaminA;
            $vitaminB += $part->vitaminB;
            $iron += $part->iron;
            echo "<tr>
                    <td>$part->name</td>
                    <td>$part->calories</td>
                    <td>$part->proteins</td>
                    <td>$part->carbo</td>
                    <td>$part->fat</td>
                    <td>$part->vitaminA</td>
                    <td>$part->vitaminB</td>
                    <td>$part->iron</td>
                 </tr>";
        }
        echo "<tr>
                    <td><b>total</b></td>
                    <td><b>$calories</b></td>
                    <td><b>$proteins</b></td>
                    <td><b>$carbo</b></td>
                    <td><b>$fat</b></td>
                    <td><b>$vitaminA</b></td>
                    <td><b>$vitaminB</b></td>
                    <td><b>$iron</b></td>
                 </tr>";
    }else{
        echo "NO DATA!";
    }
    ?>