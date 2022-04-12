<?php
$connection = mysqli_connect("localhost", "root", "", "airport");

if($connection){
    echo "Databáze připojena";
} else {
     die("Kruci písek, něco se pokazilo!");
}

$query = "SELECT * FROM airport";

$result = mysqli_query($connection, $query);

if(!$result) {
    die("Kruci písek, dotaz selhal!" .mysqli_error());
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>airtport</title>
</head>
<body>
    <p>
    <?php   
        while($row = mysqli_fetch_row($result)) {
            print_r($row);
        }
        while($row)
    ?>
</body>
</html>
