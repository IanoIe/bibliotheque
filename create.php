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
            $sql = "INSERT INTO livres (titre, auteur, categorie, stock) VALUES ('$titre', '$auteur', $categorie', '$stock)";
            $stmt = $pdo->query($sql);

            if (!$stmt) {
                $errorMessage = "Query invalid: ";
                break;
            }

            $livre = "";
            $auteur = "";
            $categorie = "";
            $stock = "";
            
            $successMessage = "Nouvelle livre est bien ajoutée!";
       
            header("location: index.php");
        } while (false);
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
    <title> Bibliotheque </title>
</head>

<style>
    body {
        width: 100%;
    }

    header {
        width: 100%;
        height: 100px;
        background-color:rgb(31, 92, 62);
    }
    h2 {
        flex-direction: column;
        margin-block-start: auto;
        text-align: center;
        padding: 25px;
        margin-bottom: 20px;
        font-size: 50px;
        color: #00cc66;
    }
    footer {
        width: 100%;
        height: 50px;
        background-color:rgb(31, 92, 62);
        text-align: center;
        color: white;
        margin-top: 100px;
        padding-top: 10px;
    
    }
</style>

<body>
    <header>

    </header>
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
                <label class="col-sm-3 col-form-label">Categorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="categorie" value=" <?php echo $categorie ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="stock" value=" <?php echo $stock ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <footer>
          <p> &copy; 2025 AC Marvel - Tous droits réservés </p>
    </footer>
</body>
</html>