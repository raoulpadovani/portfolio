<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $civilite = htmlspecialchars($_POST['civilite']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['adresse']);

    $to = "padovaniraoul@gmail.com"; // Remplacez par votre adresse email
    $subject = "Nouveau message de votre formulaire de contact";
    $body = "Civilité: $civilite\nNom: $nom\nPrénom: $prenom\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Votre message a été envoyé avec succès.');</script>";
    } else {
        echo "<script>alert('Une erreur est survenue. Veuillez réessayer.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="fonction.js" defer></script>
    <link rel="stylesheet" href="index.css">
<body>
    <header>
        <div class="tete">
                <a href="index.html">ACCUEIL</a>
                <a href="projets.html">PROJET</a>
                <a href="contact.php">CONTACT</a>
        </div>
    </header>
            <h1 class="titre"> NOUS CONTACTER</h1>
    
    <form action="contact.php" method="post"> 
        <label for="civilite">Civilité :</label>
        <select id="civilite" name="civilite">
            <option value="M.">Monsieur</option>
            <option value="Mme">Madame</option>
        </select><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="adresse">Message :</label><br>
        <textarea id="adresse" name="adresse" rows="4" required></textarea><br>

        <label for="politique">
            <input type="checkbox" id="politique" name="politique" required>
            J'accepte la politique de confidentialité.
        </label><br>

        <input type="submit" value="Envoyer">
    </form>
    <footer>
        <a href ="https://www.linkedin.com/in/raoul-padovani-3a7b23256/"target="_blank"><img src="asset/logo/linkedin.png" alt="logo c" class="src" /></a>
        <a href ="https://github.com/raoulpadovani"target="_blank"><img src="asset/logo/git.png" alt="logo c" class="src" /></a>
        <a href ="https://www.instagram.com/c0dw0lf/"target="_blank"><img src="asset/logo/insta.png" alt="logo c" class="src" /></a>
        <a href ="contact.php"target="_blank"><img src="asset/logo/contact.png" alt="logo c" class="src" /></a>
    </footer>
</body>
</html>