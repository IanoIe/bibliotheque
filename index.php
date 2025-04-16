<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
    <title>Project Bibliotheque</title>    
</head>
<style>
    table, th, td {
     border:1px solid black; 
}

header {
    width: 100%;
    height: 100px;
    background-color:rgb(31, 92, 62);
}
footer{
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
        <h1 style="text-align: center; color:rgb(101, 191, 10)">Bibliotheque</h1>
        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Ajouter Un Livre</a>
        <br>
        <table class="table">
            <thead style="background-color: #C0C0C0; border: 3px solid black;">
                <tr>
                    <th>id</th>
                    <th>Titre de Livre</th>
                    <th>Auteur</th>
                    <th>Categorie</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        <!-- Connexion a base de donnée -->
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

             $sql = "SELECT * FROM livres";
             $stmt = $pdo->query($sql);

             if (!$stmt) {
                die("Invalid query: ");
             }
             // lire les données de chaque ligne en ligne
             while ($ligne = $stmt->fetch()) {
                echo "<tr>
                         <td>$ligne[id]</td>
                         <td>$ligne[titre]</td>
                         <td>$ligne[auteur]</td>
                         <td>$ligne[categorie]</td>
                         <td>$ligne[stock]</td>
                         <td>
                             <a class='btn btn-primary btn-sm' href='edit.php?id=$ligne[id]'>Edit</a>
                             <a class='btn btn-danger btn-sm' href='delete.php?id=$ligne[id]'>Delete<br></a>
                         </td>
                     </tr>";
             }
        ?>
                
            </tbody>
        </table>
      

    </div>

    <footer>
        <p> &copy; 2025 AC Marvel - Tous droits réservés </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>