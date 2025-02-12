<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../FILELEC/assets/css/catalogue.css">
    <title>Catalogue</title>
</head>
<body>

<!-- Barre de navigation latérale -->
<nav class="nav-cata">
    <ul>
        <li><a href="#">Marques</a>
            <ul>
                <li><a href="#">Toyota</a></li>
                <li><a href="#">Ford</a></li>
                <li><a href="#">BMW</a></li>
                <li><a href="#">Mercedes-Benz</a></li>
                <li><a href="#">Audi</a></li>
                <li><a href="#">Volkswagen</a></li>
                <li><a href="#">Renault</a></li>
                <li><a href="#">Peugeot</a></li>
            </ul>
        </li>
        <li><a href="#">Type de Pneus</a>
            <ul>
                <li><a href="#">Pneus Hiver</a></li>
                <li><a href="#">Pneus Été</a></li>
                <li><a href="#">Pneus 4 Saisons</a></li>
                <li><a href="#">Pneus Runflat</a></li>
            </ul>
        </li>
        <li><a href="#">Équipement</a>
            <ul>
                <li><a href="#">Valves</a></li>
                <li><a href="#">Jantes</a></li>
                <li><a href="#">Kit de Réparation</a></li>
                <li><a href="#">Compresseurs</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!-- Contenu principal -->
<div class="content">
    <h1>Catalogue des articles</h1>

    <?php if (empty($articles)): ?>
        <p>Aucun article disponible pour le moment.</p>
    <?php else: ?>
        <div class="articles">
            <?php foreach ($articles as $article): ?>
                <div class="article">
                    <h2>
                        <?= htmlspecialchars($article['nom_article']) ?> 
                        <span>(<?= htmlspecialchars($article['nom_cat']) ?>)</span>
                    </h2>
                    <img src="<?= htmlspecialchars($article['url_article']) ?>" 
                         alt="Image de <?= htmlspecialchars($article['nom_article']) ?>" class="article-img">
                    <p><?= htmlspecialchars($article['description_article']) ?></p>
                    <p class="price">Prix : <strong><?= number_format($article['prix_article'], 2, ',', ' ') ?> €</strong></p>
                    
                   
                    <a href="./principal/article.php?id=<?= urlencode($article['id_article']) ?>" class="view-button">
    Voir l'article
</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>