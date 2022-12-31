<?php
//Définition des champs et remise à zéro
$name = $email = $msg = $subject = $human = "";
$Envoiformulaire ="";

//Vérification du remplissage des champs
if (!empty($_POST['user_message']) && !empty($_POST['user_mail']) && !empty($_POST['user_name']) && !empty($_POST['subject']))
{
        //déclaration des champs à utiliser 
        $name = $_POST['user_name'];
        $email = $_POST['user_mail'];
        $msg = $_POST['user_message'];
        $subject = $_POST['subject'];
        $human = $_POST['human'];

        //indication des erreurs possibles directement sur la page
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );

        //Vérification de l'adresse mail
        if (filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL) === FALSE)
        { 
            $Envoiformulaire="<p>L'adresse mail n'est pas conforme !</p>";
        }else{
                //création de l'email
                    $entete  = 'MIME-Version: 1.0' . "\r\n";
                    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $entete .= 'From: webmaster@ecrinsdespatule.go.yo.fr' . "\r\n";
                    $entete .= 'Reply-to: ' . $email . "\r\n";
                    $entete .= 'X-Mailer: PHP/' . phpversion();
            
                    $message = '<h3>Message envoyé depuis la page Contact de ecrinsdespatule.go.yo.fr</h3>
                    <p>
                    <b>Nom : </b>'. htmlspecialchars($name) .'<br>
                    <b>Email : </b>'. $email .'<br>
                    <b>Sujet : </b>'. htmlspecialchars($subject) .'<br>
                    <b>Message : </b>'. htmlspecialchars($msg) .'</p>';

                //Envoi de l'email
                if (mail('webmaster@ecrinsdespatule.go.yo.fr', 'Envoi depuis page Contact', $message, $entete)) 
                    {
                        $Envoiformulaire="<p>Votre message a bien été envoyé !</p>";
                }else{
                    $Envoiformulaire="<p>L'email n'a pas été envoyé, merci de recommencer !</p>";
                };
            };
        };
    echo $Envoiformulaire;
?>



