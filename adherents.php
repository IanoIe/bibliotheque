<?php
    include("connect.php");
    include("tampletes/header.php");
?>

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
    <title>Adherents</title>
</head>
<body>

     <div class="container my-5">
     <h1 style="margin-top: 25px; text-align: center; color:rgb(101, 191, 10)">Adherents</h1>
     <br>
     <table class="table">
        <thead style="background-color: #C0C0C0; border: 3px solid black;">
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>EMAIL</th>
                <th>Date of Inscriptions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 $sql = "SELECT * FROM adherents";
                 $stmt = $pdo->query($sql);
                 if (!$stmt) {
                    die("Invalid query: ");
                 }
                  // lire les données de chaque ligne en ligne
                 while ($ligne = $stmt->fetch()){
                       echo"<tr>
                               <td>$ligne[id]</td>
                               <td>$ligne[nom]</td>
                               <td>$ligne[email]</td>
                               <td>$ligne[date_inscription]</td>
                             </tr>";
                   }
             ?>
            </tbody>
        </table>
    </div>


    
     <?php
         include("tampletes/footer.php");
     ?>
</body>
</html>