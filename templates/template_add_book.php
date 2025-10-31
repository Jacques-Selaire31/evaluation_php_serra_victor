<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <main class="container">
        <section>
            <h1>Ajouter un livre</h1>
            <form action="" method="post">
                <input type="text" name="auteur" placeholder="Saisir l'auteur" required>
                <input type="text" name="titre" placeholder="Saisir un titre" required>
                <input type="text" name="description" placeholder="Saisir la description" required>
                <input type="date" name="date" placeholder="Saisir la date de publication" required>
                <label for="category-select">Choisir une catégorie:</label>
                <select id="category-select">
                    <option value="">--Please choose an option--</option>
                    <? foreach($data as $key => $value){
                        ?><option value=<?=$data[0][0]->$value ?? "" ?><?=$value->name?></option>
                   <? } ?>
                    <option value=""></option>
                </select>
                <input type="submit" value="Se connecter" name="submit">
            </form>
            <p><?= $data["message"] ?? "" ?></p>
        </section>
    </main>
</body>

</html>