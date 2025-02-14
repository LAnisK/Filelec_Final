<?php
class ModeleArticle {
    private $unPdo;

    public function __construct() {
        try {
            $this->unPdo = new PDO("mysql:host=localhost;dbname=filelec;charset=utf8", "root", "");
            $this->unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getArticleById($id_article) {
        $sql = "SELECT a.id_article, a.nom_article, a.description_article, a.prix_article, 
                       i.url_image, c.nom_cat 
                FROM article a
               Left JOIN image i ON a.id_article = i.id_article
                JOIN categorie c ON a.id_cat = c.id_cat
                WHERE a.id_article = :id_article";
        
        $stmt = $this->unPdo->prepare($sql);
        $stmt->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ajouterAuPanier($id_client, $id_article, $quantite = 1): bool {
        $sql = "INSERT INTO panier (id_client, id_article, quantite) VALUES (:id_client, :id_article, :quantite)";
        $stmt = $this->unPdo->prepare($sql);
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
        $stmt->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>