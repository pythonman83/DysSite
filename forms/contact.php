<?php
  

  // Remplacez contact@exemple.com par votre véritable adresse email de réception
  $receiving_email_address = 'contact@exemple.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Impossible de charger la bibliothèque "PHP Email Form" !');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Décommentez le code ci-dessous si vous souhaitez utiliser SMTP pour envoyer des e-mails. Vous devez saisir vos informations d'identification SMTP correctes
 /*
  $contact->smtp = array(
    'host' => 'exemple.com',
    'username' => 'exemple',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
