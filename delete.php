<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $host = 'localhost';
        $dbname = 'bibliotheque';
        $user = 'root';
        $pass = 'Mamae13';
        
        try {
            $stmt = new PDO("mysql:host=$host;dbname=$dbname;chartset=utf8", $user, $pass);
            echo "Connexion réussie <br>";
            } catch (PDOException $e) {
              echo "Erreur de connexion : <br>". $e->getMessage();
           }

           $sql = "DELETE FROM livres WHERE id= $id";
           $stmt->query($sql);
    }

    header("location: /bibliotheque/index.php");
    exit;
?>