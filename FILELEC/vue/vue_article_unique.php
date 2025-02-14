<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['nom_article']) ?></title>
    <link rel="stylesheet" href="../assets/css/article.css">
    <link rel="stylesheet" href="../assets/css/Nav_bar_index.css">
    <link rel="stylesheet" href="../FILELEC/assets/css/footer.css">s
</head>
<body>

<div class="article-page">
    <h1><?= htmlspecialchars($article['nom_article']) ?></h1>
    <p>Catégorie : <?= htmlspecialchars($article['nom_cat']) ?></p>
    <img src="<?= (strpos($_SERVER['PHP_SELF'], 'principal/') !== false ? '../' : '') . htmlspecialchars($article['url_article']) ?>" 
     alt="Image de l'article">
    <p class="price">Prix : <strong><?= number_format($article['prix_article'], 2, ',', ' ') ?> €</strong></p>
    <br>
    <a href="" class="add-to-cart">Ajouter au Panier</a>
    <br>
    <p> <h1>Description article: </h1></p>
    <p><?= nl2br(htmlspecialchars($article['description_article'])) ?></p>
    <br>
    <a href="http://localhost/25JV/FILELEC%201/FILELEC/index.php?page=9" class="back-btn">Retour au catalogue</a>
</div>

<script src="../assets/js/article.js"></script>
</body>
</html>
