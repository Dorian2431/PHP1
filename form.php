<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom = isset($_POST["nom"]) ? ($_POST["nom"]) : "";
        $mail = isset($_POST["mail"]) ? ($_POST["mail"]) : "";
        $message = isset($_POST["message"]) ? ($_POST["message"]) : "";

        if ($nom !== '' && $message !== '' && $mail !== '') {
            $_SESSION['message'] = "Nom: $nom <br> Email: $mail <br> Message: $message <br><br>";
            file_put_contents('messages.txt', "Nom: $nom\nEmail: $mail\nMessage: $message\n", FILE_APPEND);
            header("Location: listes.php");
            exit();
        } else {
            $_SESSION['message'] = "Veuillez saisir votre nom, votre message ou votre mail !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de contact avec sessions et fichiers</title>
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
    echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
    unset($_SESSION['message']);
}
?>

<form action="form.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    <br>
    <label for="mail">Email :</label>
    <input type="text" id="mail" name="mail" required>
    <br>
    <label for="message">Message :</label>
    <input type="text" id="message" name="message" required>
    <br>
    <button type="submit">Envoyée</button>
</form>
</body>
</html>