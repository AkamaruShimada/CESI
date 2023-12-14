<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est déjà connecté, redirige vers la page d'accueil
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: minichat.php');
    exit;
}

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez ici les informations de connexion de l'utilisateur
    $username = 'aka';
    $password = 'akatest';

    // Vérifie si les informations d'identification sont valides
    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Authentification réussie, crée une session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirige vers la page d'accueil
        header('Location: minichat.php');
        exit;
    } else {
        // Informations d'identification incorrectes, affiche un message d'erreur
        $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
