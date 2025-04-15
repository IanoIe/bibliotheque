<?php

   $host = 'localhost';
   $dbname = 'bibliotheque';
   $user = 'root';
   $pass = 'Mamae13';

   try {
       $pdo = new PDO("mysql:host=$host;dbname=$dbname;chartset=utf8", $user, $pass);
       echo "Connexion réussie <br>";
    } catch (PDOException $e) {
       echo "Erreur de connexion : <br>". $e->getMessage();
    }


    $id = "";
    $titre = "";
    $auteur = "";
    $categorie = "";
    $stock = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // GET method: Afficher les données des livres
        if (!isset($_GET["id"])) {
            header("location: index.php");
            exit;
        } 
        $id = $_GET["id"];

        // lire la ligne de livre sélectionné à partir de la table de base de données
        $sql = "SELECT * FROM livres WHERE id=$id";
        $stmt = $pdo->query($sql);
        $ligne = $stmt->fetch();

        if (!$ligne) {
            header("location: index.php");
            exit;
        }
    } else {
        // POST method: mettre à jour la données des livres
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <title> Edit </title>
</head>
<body>
    <div class="container my-5">
        <h2>Edit une Livre</h2>

        <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' rol='alert'>
                     <strong>$errorMessage</strong>
                     <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                ";
            }

        ?>

        <form method="post">
            <input type="hidden" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Titre de Livre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="titre" value=" <?php echo $titre ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Auteur de Livre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="auteur" value=" <?php echo $auteur ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">Categorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="categorie" value=" <?php echo $categorie ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">Stock</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="stock" value=" <?php echo $stock ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primay">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
        </form>
    </div>
</body>
</html>