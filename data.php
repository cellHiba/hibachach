<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <style>
        font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    padding: 20px;
    color: #333;
}

/* Style des tableaux */
table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

th, td {
    border: 1px solid #ddd;
    padding: 10px 15px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
}

/* Lignes en survol */
tr:hover {
    background-color: #f1f1f1;
}

/* Style des formulaires */
form {
    margin: 0;
}

/* Inputs dans les formulaires */
input[type="text"],
input[type="email"],
input[type="submit"],
button {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 14px;
}

/* Boutons */
input[type="submit"],
button {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover,
button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>

<!-- Formulaire d'ajout -->

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $servername = "localhost";
    $user = "root";
    $pass = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=myDB", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Création table
        $sql = "CREATE TABLE IF NOT EXISTS personne (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            num VARCHAR(12)
        )";
        $conn->exec($sql);

        // Suppression si demandé
        if (isset($_POST['supprimer'])) {
            $id = $_POST['supprimer'];
            $delete = $conn->prepare("DELETE FROM personne WHERE id = :id");
            $delete->bindParam(":id", $id);
            $delete->execute();
        }else if (!empty($_POST['nom']) && !empty($_POST['prenom'])) {
        // Sinon insertion (uniquement si bouton ajouter est cliqué)
            $stmt = $conn->prepare("INSERT INTO personne (firstname, lastname, email, num) 
                                    VALUES (:firstname, :lastname, :email, :num)");
            $stmt->bindParam(":firstname", $_POST["nom"]);
            $stmt->bindParam(":lastname", $_POST["prenom"]);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->bindParam(":num", $_POST["num"]);
            $stmt->execute();
        }if($_SERVER["REQUEST_METHOD"] == "POST"){
        $st = $conn->prepare("UPDATE personne SET firstname = :firstname, lastname = :lastname, email = :email, num = :num WHERE id = :id");
        $st->bindParam(":firstname", $_POST["nom1"]);
        $st->bindParam(":lastname", $_POST["pre"]);
        $st->bindParam(":email", $_POST["email1"]);
        $st->bindParam(":num", $_POST["numr"]);
        $st->bindParam(":id", $_POST["id1"]);
        $st->execute();
    }
        

        // Affichage
        $result = $conn->query("SELECT * FROM personne");
        echo "<table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Numéro</th>
                    <th>Supprimer</th>
                </tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['num']}</td>
                    <td>
                        <form method='POST'>
                            <button type='submit' name='supprimer' value='{$row['id']}' onclick=\"return confirm('Voulez-vous vraiment supprimer cette personne ?')\">Supprimer</button>
                        </form>
                    </td>
                  </tr>";
        }

        echo "</table>
        
        <br>
        <br>
        <br>
        <h3>modifier les information d un personne a partir de son ID</h3>
        <br>
        <br>
        <br>";
        echo"<form method='POST'>
        <table>
        <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Numéro</th>
                    <th>modifier</th>
        </tr>
        <tr>
        <td> <input type= 'text' name='id1'> </td>
        <td><input type= 'text' name='nom1'></td>
        <td><input type= 'text' name='pre'></td>
        <td><input type= 'email' name='email1'></td>
        <td><input type= 'text' name='numr'></td>
        <td><input type = 'submit'></td>
        
        </tr>
        </table>
        </form>";
        
    
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>




</body>
</html>
