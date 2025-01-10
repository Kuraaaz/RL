<?php
$host = 'localhost';
$dbname = 'repair_lycee';
$username = 'root';
$password = 'Sotcamontop94!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($email) {
        try {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM emails WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                header('Location: templates/already_register.html');
                exit();
            } else {
                $stmt = $pdo->prepare("INSERT INTO emails (email) VALUES (:email)");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

                header('Location: templates/success.html');
                exit();
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement : " . $e->getMessage();
        }
    } else {
        echo "Adresse email invalide. Veuillez réessayer.";
    }
}
?>