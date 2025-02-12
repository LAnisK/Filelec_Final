<?php
require_once '../modele/modele.article.php';

class ControleurArticle {
    private $modele;

    public function __construct() {
        $this->modele = new ModeleArticle();
    }

    public function getArticle($id_article) {
        return $this->modele->getArticleById($id_article);
    }
}
?>