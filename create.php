<?php
   
   include("connect.php");
   include("tampletes/header.php");

   $titre = "";
   $auteur = "";
   $categorie = "";
   $stock = "";
   
   $errorMessage = "";
   $successMessage = "";
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $titre = trim($_POST['titre']);
       $auteur = trim($_POST['auteur']);
       $categorie = trim($_POST['categorie']);
       $stock = trim($_POST['stock']);
   
       // Check if fields are not empty
       if (empty($titre) || empty($auteur) || empty($categorie) || empty($stock)) {
           $errorMessage = "All fields are required!";
       } elseif (!is_numeric($stock)) {
           // Check if the 'stock' field is a valid number
           $errorMessage = "The 'stock' field must be an integer!";
       } else {
           try {
               // Prepare the SQL query to insert into the database
               $sql = "INSERT INTO livres (titre, auteur, categorie, stock) VALUES (:titre, :auteur, :categorie, :stock)";
               $stmt = $pdo->prepare($sql);
   
              // Associate the parameters
               $stmt->bindParam(':titre', $titre);
               $stmt->bindParam(':auteur', $auteur);
               $stmt->bindParam(':categorie', $categorie);
               $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
   
               // Execute the query
               $stmt->execute();
   
               $successMessage = "Book added successfully!";
           } catch (PDOException $e) {
               $errorMessage = "Error adding book: " . $e->getMessage();
           }
       }
   }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>   
    <title>CREATE</title>    
</head>

<body>
    <div class="container my-5">
        <h2>Ajouter une Livre</h2>
        <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' rol='alert'>
                     <strong>$$errorMessage</strong>
                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        ?>
 
        <form action="" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Titre de Livre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="titre" requered value=" <?php echo $titre; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Auteur de Livre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="auteur" requered value=" <?php echo $auteur; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Categorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="categorie" value=" <?php echo $categorie; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="stock" value=" <?php echo $stock; ?>">
                </div>
            </div>

            <?php
                if( !empty($successMessage)) {
                    echo "
                    <div class='dow mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strrong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                            </div>
                        </div>
                    </div>";  
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/bibliotheque" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
<?php
     include("tampletes/footer.php")
?>
</body>
</html>