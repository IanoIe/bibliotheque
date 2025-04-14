<?php
    $host = 'localhost';
    $dbname = 'bibliotheque';
    $user = 'root';
    $pass = 'Mamae13';
    // Creer Connexion
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;chartset=utf8", $user, $pass);
        echo "Connexion réussie <br>";
     } catch (PDOException $e) {
        echo "Erreur de connexion : <br>". $e->getMessage();
     }

   $titre = "";
   $auteur = "";
   $categorie = "";
   $stock = "";

   $errorMessage = "";
   $successMessage = "";

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $titre = $_POST["titre"];
       $auteur = $_POST["auteur"];
       $categorie = $_POST["categorie"];
       $stock = $_POST["stock"];

       do  {
           if (empty($titre) || empty($auteur) || empty($categorie) || empty($stock)) {
               $errorMessage = "Tous les champs sont obligatoires!";
               break;
            }
            // Ajouter des nouvelles livres dans base de données
            $livre = "";
            $auteur = "";
            $categorie = "";
            $stock = "";
            
            $successMessage = "Nouvelle livre est bien ajoutée!";
       
        } while (false);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylsheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <title> Bibliotheque </title>
</head>
<body>
    <div class="container my-5">
        <h2>Ajouter une Livre</h2>

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
                    <a class="btn btn-outline-primary" href="/bibliotheque/index.php" role="button">Cancel</a>
                </div>
        </form>

    </div>
    
</body>
</html>