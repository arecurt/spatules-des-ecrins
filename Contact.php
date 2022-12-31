<!DOCTYPE html>
<html>
    <head>
        <title>Fabrication de skis</title>
        <Link rel="icon" type="image/x-icon" size="16x16" href="/Images/skiing_icon.ico">
            <link rel="stylesheet" type="text/CSS" href="style.css">
            <script  src="https://code.jquery.com/jquery-1.12.4.js"  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="  crossorigin="anonymous"></script>
            <meta charset="utf-8">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="google-site-verification" content="nFSDVjfTPYwPXyyDLRG_K1YKcS-mJXwpb0wU-6oHTyE" />
            <meta name="description" content="Formulaire de contact pour la fabrication de ski">
    </head>
    <body>
        <header>
            <h1>Contact</h1>
        </header>
            <nav>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="Definitionshape.html">Définition du Shape</a></li>
                    <li><a href="Fabrication.html">Fabrication des Skis</a></li>
                    <li><a href="Liens.html">Liens</a></li>
                    <li><a href="Contact.php">Contact</a></li>
               </ul>
            </nav>
        <main>
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
            <h2>Formulaire de contact</h2>
            <p>Pour toute question, ou suggestion, sur le contenu proposé sur ce site, n'hésitez pas à faire un retour via ce formulaire :<br/>
            </p>
            <form action="#" method="POST" id="contact" >
                <div class="formulaire">
                    <input type="text" name="user_name" placeholder="Nom" id="name" autocomplete="off" required><span>(obligatoire)</span>
                </div>
                <div class="formulaire">
                    <input type="email" name="user_mail" placeholder="E-mail" id="mail" autocomplete="off" required><span>(obligatoire)</span>
                </div>
                <div class="sujet">
                    <input type="text" name="subject" placeholder="Sujet" id="sujet" autocomplete="off" required>
                </div>
                <div class="message">
                    <textarea name="user_message" placeholder="Message" id="msg" autocomplete="off" required></textarea>
                </div>
                <div>
                    <p id="validation">Validation d'être un humain :<input type="checkbox" id="casevalidation" name="human" required>
                    </p>
                </div>    
                <div class="button">
                    <input type="submit" name="submit" value="Envoyer le message" id="button">
                </div>
            </form>
        </main>
    </body>
</html>
