<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['nom_article']) ?></title>
    <link rel="stylesheet" href="../assets/css/article.css">
  
</head>
<body>

<div class="article-page">
    <h1><?= htmlspecialchars($article['nom_article']) ?></h1>
    <p>Catégorie : <?= htmlspecialchars($article['nom_cat']) ?></p>
    <img src="<?= (strpos($_SERVER['PHP_SELF'], 'principal/') !== false ? '../' : '') . htmlspecialchars($article['url_article']) ?>" 
     alt="Image de l'article">
    <p><?= nl2br(htmlspecialchars($article['description_article'])) ?></p>
    <p class="price">Prix : <strong><?= number_format($article['prix_article'], 2, ',', ' ') ?> €</strong></p>
    <a href="../principal/catalogue.php" class="back-btn">Retour au catalogue</a>
    <button type="submit" name="Ajouter">ajouter au panier</button>
    <div>
<label for="quantite">Quantité :</label>
<select name="quantite" id="quantite">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <option value="<?= $i ?>"><?= $i ?></option>
    <?php endfor; ?>
</select>
</div>
</div>



<script src="../assets/js/article.js"></script>
</body>
</html>
