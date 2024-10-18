<?php

define("DATABASE_ADDRESS", "localhost");
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "root");
define("DATABASE_NAME", "db-posts");

$dbConnection = new mysqli(DATABASE_ADDRESS, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

if ($dbConnection->connect_error) {

    die("Connessione fallita: " . $dbConnection->connect_error);

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $dbConnection->real_escape_string($_POST['title']);
    $content = $dbConnection->real_escape_string($_POST['content']);
    $createdAt = date('Y-m-d H:i:s');

    $sqlInsert = "INSERT INTO posts (title, content, created_at) VALUES ('$title', '$content', '$createdAt')";
    
    if ($dbConnection->query($sqlInsert) === TRUE) {

        header("Location: ../index.php");

        exit;
    } else {

        echo "Errore: " . $dbConnection->error;
    }
}

$dbConnection->close();
?>
