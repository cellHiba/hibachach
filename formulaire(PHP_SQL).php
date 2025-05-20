<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <style>
    body {
        background-color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #1a237e; /* bleu marine */
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 9px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        background-color: #f9f9f9;
        transition: border 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]{
        border-color: #1a237e;
        outline: none;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #1a237e;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0d154a;
    }
</style>

</head>
<body>
    
    <form action="data.php" method="POST">
    <label >Entrer votre Nom</label>
    <input  type="text" name="nom">
    <label >Entrer votre prenom</label>
    <input type="text" name="prenom">
    <label >Entrer votre Email</label>
    <input type="email" name="email">
    <label >Entrer votre Téléphone</label>
    <input type="text" name="num">
    <br>
    <label >Envoyer</label>
    <input type="submit" >
</body>
</html>