<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controleur/controleur.article.php';

// Vérification de l'ID dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("❌ Erreur : Aucun ID reçu !");
}

$id_article = (int) $_GET['id'];  // Sécurisation de l'ID

// Instanciation du contrôleur
$controleur = new ControleurArticle();
$article = $controleur->getArticle($id_article);

if (!$article) {
    die("❌ Erreur : L'article avec l'ID " . $id_article . " n'existe pas !");
}

// Charger la vue
require_once '../vue/vue_article_unique.php';
?>