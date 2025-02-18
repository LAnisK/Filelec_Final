<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'C:\xampp\htdocs\FILELEC\vendor\autoload.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        // Configurer SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP (ex: smtp.gmail.com, smtp.office365.com)
        $mail->SMTPAuth = true;
        $mail->Username = 'filelec98@gmail.com'; // Remplace par ton adresse Gmail
        $mail->Password = 'fcls tpul aaei bqux'; // ⚠️ Active "Accès moins sécurisé" ou utilise un mot de passe d’application
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;

        // Destinataires
        $mail->setFrom($email, "$nom $prenom"); // Expéditeur
        $mail->addAddress('filelec98@gmail.com', 'Destinataire'); // Destinataire

        // Contenu
        $mail->isHTML(false);
        $mail->Subject = "📩 Nouveau message de contact";
        $mail->Body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\nTéléphone: $telephone\n\nMessage:\n$message";

        // Envoyer l'e-mail
        $mail->send();
        echo "✅ Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "❌ Erreur : {$mail->ErrorInfo}";
    }
} else {
    echo "❌ Accès non autorisé.";
}
?>
