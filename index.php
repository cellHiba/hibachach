<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       body {
        background-color:rgb(36, 71, 189);  
    }
    </style>

</head>
<body>
    <?php
       if($_SERVER["REQUEST_METHOD"] == "POST"){
          if(empty($_POST["Nom"]) || empty($_POST["Prénom"]) || empty($_POST["Email"]) || empty($_POST["Numero_tèléphone"]) || empty($_POST["Mot_passe"]) || strlen($_POST["Mot_passe"])< 6){
            echo '<p style="color:red;">Une partie des champs est vide, veuillez s\'il vous plaît les remplir ou le mot de passe contient un nombre de caractères inférieur ou égal à 6 caractères.</p>';
          }
        else{
            $Nom = htmlspecialchars($_POST["Nom"]); 
            $Prenom = htmlspecialchars($_POST["Prénom"]);  
            if(! filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL)){
                $Email='<div style="color:red">Forme de l\'Email invalide</div>';
            }
            else{$Email = htmlspecialchars($_POST["Email"]);}
            if(!preg_match("/^(\+33|0)[67][0-9]{8}$/", $_POST["Numero_tèléphone"])){
               $Numero_tèléphone='<div style="color:red">Numéro de téléphone invalide</div>';
            }
            else{$Numero_tèléphone=htmlspecialchars($_POST["Numero_tèléphone"]);}
            echo"<p>Bonjour $Nom $Prenom  </p><br>";
            echo "<p>Votre Email est: $Email </p><br>";
            echo "<p>Votre Numéro de téléphone est: $Numero_tèléphone</p>";
        }
       }
       ?>
</body>
</html>