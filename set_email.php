<?php
$host = 'localhost';
$dbname = 'repair_lycee';
$username = 'root';
$password = 'Sotcamontop94!';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($email) {
        try {
            // Préparer et exécuter la requête pour insérer l'email
            $stmt = $pdo->prepare("INSERT INTO emails (email) VALUES (:email)");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            // Redirection vers une page de confirmation
            header('Location: templates/success.html');
            exit();
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement : " . $e->getMessage();
        }
    } else {
        echo "Adresse email invalide. Veuillez réessayer.";
    }
}
?>