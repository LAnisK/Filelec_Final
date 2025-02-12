<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $message = htmlspecialchars($_POST["message"]);

    // Adresse email où envoyer les messages
    $destinataire = "theorouable07@outlook.com"; // 🔹 Remplace par ton adresse e-mail
    $sujet = "Nouveau message de contact de $nom $prenom";
    
    // Construire le message
    $contenu = "Nom: $nom\n";
    $contenu .= "Prénom: $prenom\n";
    $contenu .= "Email: $email\n";
    $contenu .= "Téléphone: $telephone\n";
    $contenu .= "Message:\n$message\n";

    // En-têtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoyer l'email
    if (mail($destinataire, $sujet, $contenu, $headers)) {
        echo "✅ Message envoyé avec succès.";
    } else {
        echo "❌ Erreur lors de l'envoi du message.";
    }
} else {
    echo "❌ Accès non autorisé.";
}
?>