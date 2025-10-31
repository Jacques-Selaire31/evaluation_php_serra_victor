<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <main class="container">
        <div>
            <form action="" method="post">
                <h1>Ajouter un compte</h1>
                <input type="text" name="firstname" placeholder="saisir votre prénom">
                <input type="text" name="lastname" placeholder="saisir votre nom">
                <input type="email" name="email" placeholder="saisir votre email">
                <input type="password" name="password" placeholder="saisir votre mot de passe">
                <input type="submit" value="Ajouter" name="submit">
            </form>
            <p><?= $data["message"] ?? "" ?></p>
        </div>
    </main>
</body>

</html>