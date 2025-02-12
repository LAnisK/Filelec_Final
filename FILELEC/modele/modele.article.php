<?php
class ModeleArticle {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=filelec;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getArticleById($id_article) {
        $sql = "SELECT a.id_article, a.nom_article, a.description_article, a.prix_article, 
                       i.url_article, c.nom_cat 
                FROM article a
                JOIN image_article i ON a.id_image_article = i.id_image_article
                JOIN categorie c ON a.id_cat = c.id_cat
                WHERE a.id_article = :id_article";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>