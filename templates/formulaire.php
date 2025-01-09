<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire - Repair Lycée</title>
  <link rel="stylesheet" href="../Static/main.css">
</head>
<body>
  <!-- Barre horizontale & boutons -->
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Retour à l'accueil</a></li>
        <li><a href="https://www.eiffel-bordeaux.org" target="_blank">Site du lycée</a></li>
      </ul>
    </nav>
  </header>

  <!-- Formulaire de mail -->
  <section id="formulaire">
    <h3 id="info-formu">Inscrivez-vous pour être informé des prochaines sessions de réparation</h3>
    <p id="confidentialite">Vos informations resteront confidentielles conformément aux règles RGPD.</p>
    <form action="formulaire.php" method="POST">
        <label for="email">Votre adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Soumettre</button>
      </form>      
  </section>  

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST['email'];

      // Connexion à la base de données
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "repair_lycee";

      // Créer une connexion
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Vérifier la connexion
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Préparer et exécuter la requête d'insertion
      $stmt = $conn->prepare("INSERT INTO users (email) VALUES (?)");
      $stmt->bind_param("s", $email);

      if ($stmt->execute()) {
          echo "<p>Inscription réussie !</p>";
      } else {
          echo "<p>Erreur : " . $stmt->error . "</p>";
      }

      // Fermer la connexion
      $stmt->close();
      $conn->close();
  }
  ?>
</body>
</html>
