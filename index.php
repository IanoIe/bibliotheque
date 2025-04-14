<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylsheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <title>Project Bibliotheque</title>


    
</head>
<body>
    <div class="container my-5">
        <h1>Project Bibliotheque</h1>
        <a class="btn btn-primary" href="/" role="button"> Add livre </a>
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
                <tr>
                    <td>1</td>
                    <td>tire de livre</td>
                    <td>auteur de livre</td>
                    <td>categorie de livre</td>
                    <td>quant en stock</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/">Edit</a>
                        <a class="btn btn-danger btn-sm" href="/">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>