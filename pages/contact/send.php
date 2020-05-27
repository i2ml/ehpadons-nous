<?

// set from form
$name = $_REQUEST['name'];
$structure = $_REQUEST['structure'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$message = $_REQUEST['message'];

$infoMessage = "
Nom & Prénom: ".$name." \n
Structure: ".$structure." \n
Email: ".$email." \n
Téléphone: ".$phone." \n
Message: ".$message." \n
";

// send mail to Admin
$adminEmails = [get_option( 'admin_email' )];
if($sendto) $adminEmails[] = $sendto;
wp_mail($adminEmails, "Nouveau contact pour CortexAgency", $infoMessage, ['Reply-To: '.$name.' <'.$email.'>']);

// send mail to Client
$clientMessage = "
Bonjour ".$name.",\n
Nous avons bien reçu votre demande, notre équipe s'engage à vous répondre dans les plus brefs délais!\n
Vous trouverez ci-dessous l'information que vous nous avez transmise.\n
Merci,\n
L'équipe CortexAgency\n\n
---------------------------------------------------------------------------------\n\n
Votre Message :\n
".$infoMessage;

wp_mail($email, "Nous avons bien reçu votre message", $clientMessage);
?>



<!--
RESPONSE
 -->

<?
get_header('compiled');
?>
<div class="contactSent">
  <p>
    Votre message a bien été envoyé,
    <br><br>
    Vous venez de recevoir une copie de votre demande dans votre boîte email,
    vérifiez dans les courriers indésirables pour autoriser nos communications futures.
    <br><br>
    Nous nous engageons à vous répondre au plus vite,
    <br><br>
    Merci,
    <br>
    L'équipe CortexAgency!

    <br>
    <br>
    <a href="/">&larr; retour au site</a>
  </p>
</div>
<?
get_footer('compiled');
?>
