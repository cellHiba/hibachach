<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        form {
            width: 100%;
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #a0a0a0;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #2d2d2d;
            border-radius: 25px;
            background-color: #1e1e1e;
            color: #e0e0e0;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #4a90e2;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #4a67d6, #6c5dd3);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <label>Nom</label>
        <input type="text" name="Nom" >
        <label>Prénom</label>
        <input type="text" name="Prénom">
        <label>Email</label>
        <input type="text" name="Email">
        <label>Numero_tèléphone</label>
        <input type="text" name="Numero_tèléphone">
        <labe>Mot_passe</labe>
        <input type="password" name="Mot_passe">
        <label>S'inscrire</label>
        <input type="submit" name="S'inscrire" >
    </form>
</body>
</html>