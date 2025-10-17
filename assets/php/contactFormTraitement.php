<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Importation manuelle (pas de Composer)
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';
require_once __DIR__ . '/PHPMailer/Exception.php';

// Import des classes du namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configuration SMTP
require_once __DIR__ . '/config.php';

// Récupération et sécurisation des données
$nom     = htmlspecialchars($_POST['nom'] ?? '');
$prenom  = htmlspecialchars($_POST['prenom'] ?? '');
$email   = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars($_POST['message'] ?? '');

if (!$email) {
    exit('Adresse email invalide.');
}

$mail = new PHPMailer(true);

try {
    // Paramètres SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Expéditeur et destinataire
    $mail->setFrom(SMTP_USER, 'Formulaire Pods');
    $mail->addAddress(SMTP_USER, 'Admin');

    // Contenu du mail
    $mail->isHTML(true);
    $mail->Subject = '📩 Nouveau message depuis le formulaire';
    $mail->Body = "
        <h2>Nouveau message reçu</h2>
        <p><strong>Prénom :</strong> $prenom</p>
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Message :</strong><br>$message</p>
    ";

    $mail->send();
    echo '✅ Message envoyé avec succès.';
    header('Location: /index.php#contact');
    exit;
} catch (Exception $e) {
    echo "❌ Erreur lors de l’envoi : {$mail->ErrorInfo}";
}
