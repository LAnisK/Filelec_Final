<?php
require_once './controleur/controleur.contact.php';

$messageRetour = "";

// Vérifie que les champs sont bien remplis avant de les traiter
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["telephone"], $_POST["message"])) {
    $controleurContact = new ControleurContact();
    $messageRetour = $controleurContact->traiterFormulaire(
        trim($_POST["nom"]),
        trim($_POST["prenom"]),
        trim($_POST["email"]),
        trim($_POST["telephone"]),
        trim($_POST["message"])
    );
}

// Charge la vue
require_once './vue/select/vue_select_contact.php';
?>
