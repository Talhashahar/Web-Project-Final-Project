<?php
/**
 * Created by PhpStorm.
 * User: talha_000
 * Date: 09/02/2018
 * Time: 18:50
 */

class Shake{
    public $shake_id;
    public $name;
    public $picture;
    public $parts;
}

class Part{
    public $part_id;
    public $type;
    public $name;
    public $picture;
    public $calories;
    public $proteins;
    public $carbo;
    public $fat;
    public $vitaminA;
    public $vitaminB;
    public $iron;
}

class User
{
    public $user_id;
    public $password;
    public $name;
    public $email;
    public $picture;
}

function connect(){
    global $connection;
    $dbhost = "182.50.133.55";
    $dbuser = "auxstudDB7c";
    $dbpass = "auxstud7cDB1!";
    $dbname = "auxstudDB7c";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //mysqli_connect is a newer version of mysql_connect. Its for mysql > ver 4.1.3

    //testing connection success
    if (mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
}

function disconnect()
{
    global $connection;
    mysqli_close($connection);

}

function getPartByType($type_id)
{
    global $connection;
    $partsArray = array();
    $result = null;
    connect();
    $query = "SELECT * FROM tbl_224_parts WHERE type = " .$type_id . " ";
    try {
        $result = mysqli_query($connection, $query);
    }
    catch (Exception $e)
    {
        echo "<script>console.log( 'query failed' );</script>";
    }
    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $partsArray[] = RowDataToPartObject($row);
        }
    } else {
        $partsArray = null;
    }
    return $partsArray;
}


function getAvlPartsByType($user_id, $type_id)
{
    global $connection;
    $partsArray = array();

    $query = "SELECT * FROM ( SELECT * FROM tbl_224_supply WHERE quantity > 0 and user_id = " .$user_id . " and ) AS p1 JOIN tbl_224_parts AS p2 on p1.part_id = p2.part_id". " ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $partsArray[] = RowDataToPartObject($row);
        }
    } else {
        $partsArray = null;
    }
    return $partsArray;
}


function getHistoryShakeByUserID($userID){
    global $connection;
    $shakes = array();

    $query = "SELECT * FROM (SELECT shake_id FROM `tbl_224_history` where user_id=" . $userID . ") as s1 natural join tbl_224_shake " ;

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $shakes[] = RowDataToShakeObject($row);
        }
    } else {
        $shakes = null;
        return $shakes;
    }
    return $shakes;
}

function getFavoritShakeByUserID($userID){
    global $connection;
    $shakes = array();

    $query = "SELECT * FROM (SELECT shake_id FROM `tbl_224_favorits` where user_id=" . $userID . ") as s1 natural join tbl_224_shake " ;

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $shakes[] = RowDataToShakeObject($row);
        }
    } else {
        $shakes = null;
        return $shakes;
    }
    return $shakes;
}

function getRecipesShake(){
    global $connection;
    $shakes = array();

    $query = "SELECT * FROM (SELECT shake_id FROM `tbl_224_recipes`) as s1 natural join tbl_224_shake " ;

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $shakes[] = RowDataToShakeObject($row);
        }
    } else {
        $shakes = null;
        return $shakes;
    }
    return $shakes;
}


/*
function AddToFavorit($userID, $shake_id){
    global $connection;
    $nothing ="null";
    $query = "INSERT INTO auxstudDB7c.tbl_224_favorits (shake_id ,user_id) VALUES (".$userID",".$shake_id.")";
    if ( $connection->query($query) === TRUE) {
        return "1";
    } else {
        return $connection->error." error";
    }
}

function AddToHistory($userID, $shake_id){
    global $connection;
    $nothing ="null";
    $query = "INSERT INTO auxstudDB7c.tbl_224_history (shake_id ,user_id) VALUES (".$userID",".$shake_id.")";
    if ( $connection->query($query) === TRUE) {
        return "1";
    } else {
        return $connection->error." error";
    }
}
*/

function getPartQuantity($part_id , $user_id){
    global $connection;
    global $connection;
    $partsArray = array();

    $query = "SELECT * FROM tbl_224_parts WHERE part_id = " .$part_id . " AND user_id = " . $user_id . " ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $partsArray[] = RowDataToPartObject($row);
        }
    } else {
        $partsArray = null;
    }
    return $partsArray;
}

function getPartByID($part_id){
    global $connection;
    $partsArray = array();

    $query = "SELECT * FROM tbl_224_parts WHERE part_id = " .$part_id . " ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $partsArray[] = RowDataToPartObject($row);
        }
    } else {
        $partsArray = null;
    }
    return $partsArray[0];
}

function getRecipeByID($recipe_id){
    global $connection;
    $shakes = array();

    $query = "SELECT * FROM (SELECT shake_id FROM `tbl_224_recipes` where shake_id=".$recipe_id.") as s1 natural join tbl_224_shake " ;
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            $shakes[] = RowDataToShakeObject($row);
        }
    } else {
        $shakes = null;
        return $shakes;
    }
    return $shakes[0];
}







//convert data to object
function RowDataToPartObject($row){
    $part = new Part();
    $part->part_id = $row["part_id"];
    $part->type = $row["type"];
    $part->name = $row["name"];
    $part->picture = $row["picture"];
    $part->calories = $row["calories"];
    $part->proteins = $row["proteins"];
    $part->carbo = $row["carbo"];
    $part->fat = $row["fat"];
    $part->vitaminA = $row["vitaminA"];
    $part->vitaminB = $row["vitaminB"];
    $part->iron = $row["iron"];
    return $part;
}

function RowDataToShakeObject($row){

    $shake = new Shake();
    $shake->shake_id = $row["shake_id"];
    $shake->name = $row["shake_name"];
    $shake->picture = $row["picture"];
    $shake->parts[0] = getPartByID($row["part_1"]);
    $shake->parts[1] = getPartByID($row["part_2"]);
    $shake->parts[2] = getPartByID($row["part_3"]);
    $shake->parts[3] = getPartByID($row["part_4"]);
    $shake->parts[4] = getPartByID($row["part_5"]);
    $shake->parts[5] = getPartByID($row["part_6"]);
    $shake->parts[6] = getPartByID($row["part_7"]);
    $shake->parts[7] = getPartByID($row["part_8"]);
    return $shake;
}

