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

$posts = [];

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {

        $posts[] = $row;
//         echo  $row['title'];
//         echo  $row['content'];
//         echo  $row['created_at'];
        }
} 
 //else {
//     echo "nessun post trovato.";
// }


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

    <div class="container mt-5">

        <h1 class="text-center"> nuovo post </h1>

        <form action="assets/posts.php" method="post">

            <div class="form-group">
                <div>
                    <label for="title">titolo:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
            </div>

            <div class="form-group">

                <div>
                    <label for="content">contenuto:</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">aggiungi post</button>

        </form>

        <h2 class="mt-5">lista dei post</h2>

        <?php 

        if (count($posts) > 0) {

        foreach ($posts as $row) {

        ?>
            <div class="card mt-3">

                <div class="card-body">

                    <h5 class="card-title"><?php echo $row['title']; ?></h5>

                    <p class="card-text"><?php echo $row['content']; ?></p>

                    <p class="card-text"><small class="text-muted">pubblicato il: <?php echo $row['created_at']; ?></small></p>

                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-warning mt-3">nessun post trovato</div>
        <?php
    }
    ?>


    </div>
</body>
</html>