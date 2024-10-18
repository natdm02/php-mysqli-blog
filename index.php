<?php



define("DATABASE_ADDRESS", "localhost");
define("DATABASE_USERNAME", "root"); 
define("DATABASE_PASSWORD", "root");     
define("DATABASE_NAME", "db-posts");

$dbConnection = new mysqli(DATABASE_ADDRESS, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

if ($dbConnection->connect_error) {
    die("Connessione fallita: " . $dbConnection->connect_error);
}


$sqlQuery = "SELECT * FROM posts ORDER BY created_at DESC";

$result = $dbConnection->query($sqlQuery);


if ($result->num_rows > 0) {
    
    
    while ($row = $result->fetch_assoc()) {

        echo  $row['title'];
        echo  $row['content'];
        echo  $row['created_at'];
    }
} else {
    echo "nessun post trovato.";
}


$dbConnection->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-mysqli-blog</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>