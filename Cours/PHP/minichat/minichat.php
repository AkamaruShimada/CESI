<?php

session_start();    

include("db.php");

$response = $PDO->query("select * from msg order by ID desc limit 10");
$rows = $response->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="minichat_post.php">
        <input type="text" name="pseudo" placeholder="your pseudo" />
        <input type="text" name="message" placeholder="your message" />
        <button type="submit">Post</button>
    </form>
    <?php
    foreach ($rows as $row) {
        $pseudo = $row['pseudo'];
        $message = $row['message'];
        echo "<p><b>$pseudo</b>: $message</p>";
    }
    ?>

    <form action="log_in.php">
        <button type="submit">Log in</button>
    </form>
    <form action="unlog.php" method="POST">
        <button type="submit">Log out</button>
    </form>
</body>

</html>