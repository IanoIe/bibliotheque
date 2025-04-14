<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylsheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <title>Project Bibliotheque</title>    
</head>
<body>
    <div class="container my-5">
        <h1>Project Bibliotheque</h1>
        <a class="btn btn-primary" href="create.php" role="button"> Add livre </a>
        <br>
        <table class="table">
            <thead>
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
                
            </tbody>
        </table>
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
             // lire les données de chaque ligne en ligne
             while ($ligne = $stmt->fetch()) {
                echo "
                <tr>
                    <td>$ligne[id]</td>
                    <td>$ligne[titre]</td>
                    <td>$ligne[auteur]</td>
                    <td>$ligne[categorie]</td>
                    <td>$ligne[stock]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='eddit.php?id=$ligne[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?id=$ligne[id]'>Delete<br></a>
                    </td>
                </tr>
                ";
             }
        ?>

    </div>
</body>
</html>