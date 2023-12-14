<?php

include("db.php");

$pseudo = $_POST['pseudo'];
$message = $_POST['message'];

if (!empty($pseudo) && !empty($message)) {
    $preparedRequest = $PDO->prepare("INSERT INTO msg(pseudo, message) values (:pseudo, :message)");
    $preparedRequest->execute(
        array(
            "pseudo" => $pseudo,
            "message" => $message
        )
    );
}

header("location: minichat.php");
